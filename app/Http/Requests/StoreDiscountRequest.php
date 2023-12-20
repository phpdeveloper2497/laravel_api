<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiscountRequest extends FormRequest
{
    /**
     * TODO ad permission management.
     */
    public function authorize(): bool
    {
        return true;
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
