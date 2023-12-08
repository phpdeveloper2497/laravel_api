<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use App\Http\Requests\StorePaymentTypeRequest;
use App\Http\Requests\UpdatePaymentTypeRequest;
use Illuminate\Database\Eloquent\Collection;

class PaymentTypeController extends Controller
{

    public function index()
    {
       return $this->response(PaymentType::all());
    }

    public function store(StorePaymentTypeRequest $request)
    {
        //
    }


    public function show(PaymentType $paymentType)
    {
        //
    }

     /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentTypeRequest $request, PaymentType $paymentType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentType $paymentType)
    {
        //
    }
}
