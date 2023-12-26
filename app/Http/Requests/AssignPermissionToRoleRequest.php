<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignPermissionToRoleRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->user()->can('role:assign');
    }


    public function rules(): array
    {
        return [
            "permission_id" =>"required",
            "role_id" =>"required"
        ];
    }
}
