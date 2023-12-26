<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        if ($this->getDiscount())
        {
            if($this->discount->sum)
            {
                $this->discountedPrice = $this->price - $this->discount->sum;
            }
            elseif($this->discount->percent)
            {
                $this->discountedPrice = round($this->price * ((100 - $this->discount->percent)/100));
            }
        }
//        dd($this->getDiscount());

        return [
            'id' => $this->id,
            'name' => $this->getTranslations('name'),
            'price' => $this->price,
            'description' => $this->getTranslations('description'),
            'category' => new CategoryResource($this->category),
            'inventory' => Stockresource::collection($this->stocks),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'order_quantity' => $this->when(isset($this->quantity), $this->quantity),
            'photos' =>  PhotoResource::collection($this->photos),
            'discount' => $this->getDiscount(),
            'discountedPrice' => $this->discountedPrice ?? null,
        ];
    }
}
