<?php

namespace App\Http\Controllers;

use App\Models\UserPaymentCard;
use App\Http\Requests\StoreUserPaymentCardRequest;
use App\Http\Requests\UpdateUserPaymentCardRequest;
use Illuminate\Database\Eloquent\Collection;

class UserPaymentCardController extends Controller
{

    public function index() :Collection
    {
      return UserPaymentCard::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserPaymentCardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserPaymentCard $userPaymentCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserPaymentCard $userPaymentCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserPaymentCardRequest $request, UserPaymentCard $userPaymentCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserPaymentCard $userPaymentCard)
    {
        //
    }
}
