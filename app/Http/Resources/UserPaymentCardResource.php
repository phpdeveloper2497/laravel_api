<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class UserPaymentCardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'card_type' => $this->paymentCardType,
            'name' => decrypt($this->name),
            'number' =>"**** **** **** " . decrypt($this->last_four_number),
        ];
    }
}
