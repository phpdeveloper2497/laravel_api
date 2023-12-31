<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\AuthService;
use App\Services\FileService;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use function Laravel\Prompts\password;

class AuthController extends Controller
{

    public function __construct(
        protected AuthService $authService,
        protected FileService $fileService,
    ){}

    public function login(LoginRequest $request)
    {
        $user = $this->authService->checkCredentials($request);

        return $this->success(
            '',
            ['token' => $user->createToken($request->email)->plainTextToken
            ]);

    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return $this->success('User logged out');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        $user->assignRole('customer');

        $this->fileService->checkUserPhoto($request, $user);

        auth()->login($user);

        return $this->success('user created',
            ['token' => $user->createToken($request->email)->plainTextToken
            ]);
    }

    public function user(Request $request)
    {
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
