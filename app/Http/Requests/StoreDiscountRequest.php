<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiscountRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->user()->can('discount:create');
    }

    public function rules(): array
    {
        return [
            'product_id' => 'required',
            'name' => 'nullable|string',
            'percent' => 'required_without:sum',
            'sum' => 'required_without:percent',
            'from' => 'nullable',
            'to' => 'nullable',
        ];
    }
}
