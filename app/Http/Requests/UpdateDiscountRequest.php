<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDiscountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'nullable|string',
            'percent' => 'required_without:sum',
            'sum' => 'required_without:percent',
            'from' => 'nullable',
            'to' => 'nullable',
        ];
    }
}
