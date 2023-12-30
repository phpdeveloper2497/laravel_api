<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\DeliveryMethod;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Product;
use App\Models\Stock;
use App\Models\User;
use App\Models\UserAddress;
use App\Repositories\OrderRepository;
use App\Repositories\StockRepository;
use App\Services\OrderService;
use App\Services\ProductService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function __construct(
        /*refactoring olib borilgan joylar*/
        protected OrderService   $orderService,
        protected ProductService $productService,
    )
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Order::class, 'order');
    }

    public function index(): JsonResponse
    {
        if (request()->has('status_id')) {
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
        $deliveryMethod = DeliveryMethod::findOrFail($request->delivery_method_id);
        $address = UserAddress::find($request->address_id);

        /*Skladda product bor yoki yo'qligifga tekshirish*/
        list($sum, $product_list, $notFoundProduct) = $this->productService->checkForProductStock(
            $request['product_list'], $sum, $product_list, $notFoundProduct);

        /*Agar skladda product bor bo'lsa order yaratish*/
        if ($notFoundProduct === [] && $product_list !== [] && $sum !== 0) {
            $order = $this->orderService->saveOrder($deliveryMethod, $sum, $request, $address, $product_list);
            return $this->success('Order created', $order);
        } else {
            return $this->error('Some product was not found or does not have inventory', $notFoundProduct);

        }
        return "Something went wrong, we can’t put things in order";
    }

    public function show(Order $order): JsonResponse
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
