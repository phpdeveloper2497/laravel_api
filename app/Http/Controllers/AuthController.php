<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use function Laravel\Prompts\password;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $this->success(
            '',
            ['token' => $user->createToken($request->email)->plainTextToken
            ]);

    }


    public function logout()
    {

    }

    public function register()
    {

    }

    public function user(Request $request)
    {
//        return $request->user()->getAllPermissions();
        return $this->response(new UserResource($request->user()));
    }

    public function changePassword(Request $request)
    {

//        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
//            // The passwords matches
//            return redirect()->back()->with("error", "Your current password does not matches with the password.");
//        }
//
//        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
//            // Current password and new password same
//            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
//        }
//
//        $validatedData = $request->validate([
//            'current-password' => 'required',
//            'new-password' => 'required|string|min:8|confirmed',
//        ]);
//
//        //Change Password
//        $user = Auth::user();
//        $user->password = bcrypt($request->get('new-password'));
//        $user->save();
//
//        return redirect()->back()->with("success", "Password successfully changed!");
    }

}
