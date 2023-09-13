<?php

namespace App\Http\Controllers;

use Exseption;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreWishlistRequest;
use App\Http\Requests\UpdateWishlistRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Wishlist\WishlistResource;

class WishlistController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return WishlistResource::collection(Wishlist::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWishlistRequest $request)
    {
        try{

            $wishlist = Wishlist::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id,
            ]);

            return response([
                'data' => new WishlistResource($wishlist)
            ], Response::HTTP_CREATED);

        }catch(\Exseption $e){
             return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        return new WishlistResource($wishlist);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWishlistRequest $request, Wishlist $wishlist)
    {
        try{

            $wishlist->update([
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id,
            ]);

            return response([
                'data' => new WishlistResource($wishlist)
            ], Response::HTTP_CREATED);

        }catch(\Exseption $e){
             return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist)
    {
        try{
            $wishlist->delete();
            return response(null, Response::HTTP_NO_CONTENT);

        }catch(\Exseption $e){
             return response()->json($e);
        }
    }
}
