<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->user()->can('role:create');
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
        ];
    }
}
