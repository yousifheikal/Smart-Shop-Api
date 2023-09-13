<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Http\Resources\Review\ReviewResource;
use Symfony\Component\HttpFoundation\Response;

class ReviewController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        return  ReviewResource::collection($product->reviews);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request, Product $product)
    {


        try{


            $review = new Review($request->all());
            $product->reviews()->save($review);

            return response([
                'data' => new ReviewResource($review)
            ], Response::HTTP_CREATED);

        }catch(\Exseption $e){

             return response()->json($e);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Product $product, Review $review)
    {
        try{

            $review->update([
                'product_id' => $product->id,
                'customer' => $request->customer,
                'review' => $request->review,
                'star' => $request->star
            ]);

            return response([
                'data' => new ReviewResource($review)
            ], Response::HTTP_CREATED);

        }catch(\Exseption $e){

             return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, Review $review)
    {

        try{
            $review->delete();
            return response(null, Response::HTTP_NO_CONTENT);

        }catch(\Exseption $e){

             return response()->json($e);
        }
    }
}
