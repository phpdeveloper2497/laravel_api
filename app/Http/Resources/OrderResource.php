<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'comment' => $this->comment,
            'sum' => $this->sum,
            'status' => $this->status,
            'user' => $this->user,
            'product_list' => $this->product_list,
            'address' => $this->address,
            'delivery_method' => $this->deliveryMethod,
            'payment_type' => $this->paymentType
        ];
    }
}
