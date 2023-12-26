<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:sanctum')->except(['index','show']);
    }

    public function index()
    {
        return ProductResource::collection(Product::cursorPaginate(20));
    }


    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->toArray());
        return $this->success('product created', new ProductResource($product));
    }


  public function show(Product $product)
    {
          return $this->response(new ProductResource($product));
    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        Gate::authorize('product:delete');
        $storage = Storage::delete($product->photos()->pluck('path')->toArray());
//        Storage::deleteDirectory('/storage/app/public/products/60');
        $product->photos()->delete();
        $product->delete();

        return $this->success('Product deleted successfully');
    }

    public function similar(Product $product)
    {
        return $this->response(
            ProductResource::collection(
                Product::query()
                    ->where('category_id', $product->category_id)
                    ->limit(20)->get()
            ));
    }
}
