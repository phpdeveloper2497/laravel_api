<?php

namespace App\Services;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\StoreProductPhotoRequest;
use App\Models\Product;

class FileService extends Service
{
    public function checkUserPhoto(RegisterRequest $request, $user): void
    {
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('users/' . $user->id, 'public');
            $user->photos()->create([
                'full_name' => $request->file('photo')->getClientOriginalName(),
                'path' => $path,
            ]);
        }
    }

    public function saveProductPhoto(StoreProductPhotoRequest $request, Product $product): void
    {
        foreach ((array)$request->photos as $photo) {
            $path = $photo->store('products/' . $product->id, 'public');
            $full_name = $photo->getClientOriginalName();

            $product->photos()->create([
                'path' => $path,
                'full_name' => $full_name
            ]);
        }
    }
}
