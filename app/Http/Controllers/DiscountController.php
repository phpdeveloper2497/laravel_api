<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;

class DiscountController extends Controller
{

    public function index()
    {

        return $this->response(Discount::all());
    }



    public function store(StoreDiscountRequest $request)
    {
        $discount = Discount::create($request->validated());

        return $this->success('discount created', $discount);
    }


    public function show(Discount $discount)
    {
        //
    }

    public function update(UpdateDiscountRequest $request, Discount $discount)
    {
        //
    }


    public function destroy(Discount $discount)
    {
        //
    }
}
