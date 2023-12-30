<?php

namespace App\Services;

use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductService extends Service
{

    public function checkForProductStock($product_list1, float|int $sum, array $product_list, array $notFoundProduct): array
    {
        foreach ($product_list1 as $requestProduct) {
            $product = Product::with('stocks')->findOrFail($requestProduct['product_id']);
            $product->quantity = $requestProduct['quantity'];

            if (
                /*Skladda product bor yoki qo'qligini tekshirish*/
                $product->stocks()->find($requestProduct['stock_id']) &&
                $product->stocks()->find($requestProduct['stock_id'])->quantity >= $requestProduct['quantity']
            ) {
                $productWithStock = $product->withStock($requestProduct['stock_id']);
                $productResource = (new ProductResource($productWithStock))->resolve();

                $sum += ($productResource['discountedPrice'] ?? $productResource['price']) * $requestProduct['quantity'];
                $sum += $productWithStock->stocks[0]->addition_cost;

                $product_list[] = $productResource;
            } else {
                $requestProduct['we_have'] = $product->stocks()->find($requestProduct['stock_id'])->quantity;
                $notFoundProduct[] = $requestProduct;
            }
        }
        return array($sum, $product_list, $notFoundProduct);
    }
}
