<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:sanctum')/*->except(['index','show'])*/;
    }
//
    public function store(UserRequest $request)
    {
          $user = User::create($request->toArray());
        return $this->success('user created', new UserResource($user));
    }

    public function destroy(User $user)
    {
        Gate::authorize('user:delete');

//        dd($user);
//        Storage::delete($user->photos/*()->pluck('path')*/);
//        $user->photos()->delete();
        $user->delete();
        return $this->success('user deleted');
    }
}
