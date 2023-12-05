<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'delivery_method_id' =>'required|numeric',
            'payment_type_id' =>'required|numeric',
            'product_list' =>'required',
            'product_list.*.product_id' =>'required|numeric',
            'product_list.*.stock_id' =>'nullable|numeric',
            'product_list.*.quantity' =>'required|numeric',
            'comment' =>'nullable|max:500',

        ];
    }
}
