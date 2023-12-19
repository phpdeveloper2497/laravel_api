<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductPhotoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return request()->user()->can('product:create');
    }


    public function rules(): array
    {
        return [
            "photos.*" => "required|file|mimes:jpeg,bmp,png|max:512",
        ];
    }
}
