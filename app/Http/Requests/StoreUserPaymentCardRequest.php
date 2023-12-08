<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPaymentCardRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

        ];
//        return [
//            'name' => ['required','string','max:255'],
//            'number' => ['required','string','max:255'],
//            'exp_date' => ['required','string','max:255'],
//            'holder_name' => ['required','string','max:255'],
//            'payment_card_type_id' => ['required','string','max:255'],
//        ];
//        return [
//            "name" => "required",
//            "number" => "required",
//            "exp_date" => "required",
//            "holder_name" => "required",
//            "payment_card_type_id" => "required",
//            "last_four_number" => "required",
//        ];
    }
}
