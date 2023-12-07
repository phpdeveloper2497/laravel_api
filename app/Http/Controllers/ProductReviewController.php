<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:sanctum');
    }

    public function index(Product $product) :JsonResponse
    {


        return $this->response([
            'overall_rating' => round(($product->reviews()->avg('rating')),1),
            'reviews_count' => $product->reviews()->count(),
            'reviews' => $product->reviews()->with('user')->paginate(10),
        ]);
    }

    public function store(Product $product, StoreReviewRequest $request) :JsonResponse
    {
        $review = $product->reviews()->create([
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'comment' =>$request->comment,
        ]);

        return $this->success('Review created successfully',  $review);
    }
}
