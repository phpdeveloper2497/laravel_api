<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//      return Product::with('stock')->get();
//      return Product::with('stock')->cursorPaginate(20);

        return ProductResource::collection(Product::cursorPaginate(20));
    }


    public function store(StoreProductRequest $request)
    {
        //
    }


    public function show($id)
    {
       return Product::with('stocks')->find($id);
    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }


    public function destroy(Product $product)
    {
        //
    }
}
