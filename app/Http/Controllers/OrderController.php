<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Product;
use App\Models\Stock;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Order::class, 'order');
    }

    public function index() :JsonResponse
    {
        if(request()->has('status_id'))
        {
            return $this->response(OrderResource::collection(
                auth()->user()->orders()->where('status_id', request('status_id'))->paginate(10)
            ));
        }
        return $this->response(OrderResource::collection(
            auth()->user()->orders()->paginate(10)));
    }


    public function store(StoreOrderRequest $request)
    {
//        $product_list = Product::query()->limit(2)->get();
        $sum = 0;
        $product_list = [];
        $notFoundProduct = [];

        $address = UserAddress::find($request->address_id);


        foreach ($request['product_list'] as $requestProduct) {
            $product = Product::with('stocks')->findOrFail($requestProduct['product_id']);
            $product->quantity = $requestProduct['quantity'];

            if (
                $product->stocks()->find($requestProduct['stock_id']) &&
                $product->stocks()->find($requestProduct['stock_id'])->quantity >= $requestProduct['quantity']
            ) {

                /*
                 * Discount price
                 * Shipping fee
                 * Attribute price
                 */
                $productWithStock = $product->withStock($requestProduct['stock_id']);
                $productResource = (new ProductResource($productWithStock))->resolve();

                $sum += ($productResource['discountedPrice'] ?? $productResource['price'] ) /** $requestProduct['quantity']*/;
                $product_list[] = $productResource;
            }else
            {
                $requestProduct['we_have'] =  $product->stocks()->find($requestProduct['stock_id'])->quantity;
                $notFoundProduct[] = $requestProduct;
            }
        }

        if ($notFoundProduct ===[] && $product_list !== [] && $sum !==0)
        {

//         TODO  add status of order

            $order = auth()->user()->orders()->create([
                'comment' => $request->comment,
                'delivery_method_id' => $request->delivery_method_id,
                'payment_type_id' => $request->payment_type_id,
                'address' => $address,
                'sum' => $sum,
                'status_id' =>in_array($request['payment_type_id'], [1,2]) ? 1  : 4,
                'product_list' => $product_list,
            ]);


            if ($order) {
                foreach ($product_list as $product) {
                    $stock = Stock::find($product['inventory'][0]['id']);
                    $stock->quantity -= $product['order_quantity'];
                    $stock->save();
//                dd($stock);
                }
            }

            return $this->success('Order created', $order);
        }else
        {
            return $this->error('Some product was not found or does not have inventory', $notFoundProduct);

        }
        return "Something went wrong, we can’t put things in order";
    }

    public function show(Order $order) :JsonResponse
    {
        return $this->response(new OrderResource($order));
    }

    public function edit(Order $order)
    {
        //
    }


    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @throws AuthorizationException
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return 1;
    }
}
