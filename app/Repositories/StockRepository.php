<?php

namespace App\Repositories;

use App\Models\Stock;

class StockRepository extends Repository
{
    public function subtractFromStock($order, array $product_list): void
    {
        if ($order) {
            foreach ($product_list as $product) {
                $stock = Stock::find($product['inventory'][0]['id']);
                $stock->quantity -= $product['order_quantity'];
                $stock->save();
//                dd($stock);
            }
        }
    }
}
