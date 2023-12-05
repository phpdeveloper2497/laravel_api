<?php

namespace App\Http\Controllers;

use App\Models\UserAddress;
use App\Http\Requests\StoreUserAddressRequest;
use App\Http\Requests\UpdateUserAddressRequest;
use Illuminate\Database\Eloquent\Collection;

class UserAddressController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth:sanctum');
    }


    public function index() :Collection
    {
       return auth()->user()->addresses;
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserAddressRequest $request)
    {
       auth()->user()->addresses()->create($request->toArray());
        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(UserAddress $userAddress)
    {
        //
    }


    public function edit(UserAddress $userAddress)
    {
        //
    }


    public function update(UpdateUserAddressRequest $request, UserAddress $userAddress)
    {
        //
    }


    public function destroy(UserAddress $userAddress)
    {
        //
    }
}
