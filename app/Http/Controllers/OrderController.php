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

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        return auth()->user()->orders;
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
                $productWithStock = $product->withStock($requestProduct['stock_id']);
                $productResource = new ProductResource($productWithStock);

//            dd($productResource['price']);
                $sum += $productResource['price'];
                $product_list[] = $productResource->resolve();
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

            return 'success';
        }else
        {
            return response($notFoundProduct =[
                'success' =>false,
                'message' => 'Some product was not found or does not have inventory',
                'not_found_products' =>$notFoundProduct,
            ]);
        }
        return "Something went wrong, we can’t put things in order";
    }

    public function show(Order $order)
    {
        return new OrderResource($order);
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
     */
    public function destroy(Order $order)
    {
        //
    }
}
