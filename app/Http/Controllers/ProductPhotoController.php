<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductPhotoRequest;
use App\Models\Photo;
use App\Models\Product;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductPhotoController extends Controller
{
    public function __construct(
        protected FileService $fileService,
    )
    {
        return $this->middleware('auth:sanctum');
    }

    public function index(Product $product)
    {
        return $this->response($product->photos);
    }

    public function store(StoreProductPhotoRequest $request, Product $product)
    {
        $this->fileService->saveProductPhoto($request, $product);
        return $this->success('photo added');
    }

    public function destroy(Product $product, Photo $photo)
    {
        Gate::authorize('product:delete');

        Storage::delete($photo->path);

        $photo->delete();

        return $this->success('Product photo deleted successfully');
    }


}
