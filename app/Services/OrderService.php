<?php

namespace App\Services;

use App\Http\Requests\StoreOrderRequest;
use App\Repositories\OrderRepository;
use App\Repositories\StockRepository;

class OrderService extends Service
{
    protected OrderRepository $orderRepository;
    protected StockRepository $stockRepository;
    public function __construct()
    {
        $this->orderRepository = app(OrderRepository::class);
        $this->stockRepository = app(StockRepository::class);
    }

    public function saveOrder($deliveryMethod, $sum, StoreOrderRequest $request, $address, array $product_list)
    {
        $sum += $deliveryMethod->delivery_price;
//         TODO  add status of order
        $order = $this->orderRepository->createOrder($request, $address, $sum, $product_list);
        $this->stockRepository->subtractFromStock($order, $product_list);
        return $order;
    }
}
