<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserPhotoRequest;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class UserPhotoController extends Controller
{
    public function index()
    {
        //
    }

    public function store(StoreUserPhotoRequest $request)
    {
        //
    }

    public function destroy(User $user, Photo $photo)
    {
        Gate::authorize('user:delete');

        Storage::delete($user->path);
        $photo->delete();

        return $this->success('User photo deleted successfully');
    }
}
