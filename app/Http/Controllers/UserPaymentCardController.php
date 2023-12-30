<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserPaymentCardResource;
use App\Models\UserPaymentCard;
use App\Http\Requests\StoreUserPaymentCardRequest;
use App\Http\Requests\UpdateUserPaymentCardRequest;
use App\Repositories\PaymentCardRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class UserPaymentCardController extends Controller
{

    public function __construct(
        protected PaymentCardRepository $paymentCardRepository,
    )
    {
        $this->middleware('auth:sanctum');
    }

        public function index()
    {
      return $this->response(UserPaymentCardResource::collection(auth()->user()->paymentCards));
    }


    public function store(StoreUserPaymentCardRequest $request)
    {

        $card = $this->paymentCardRepository->savePaymentCard($request);
        return $this->success('Added card', $card);
    }


    public function show(UserPaymentCard $userPaymentCard)
    {
        //
    }

    public function destroy(UserPaymentCard $userPaymentCard)
    {
        //
    }

}
