<?php

namespace App\Http\Controllers;

use Exseption;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Http\Resources\Cart\CartResource;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
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
        return CartResource::collection(Cart::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request)
    {
        try{

            $cart = Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);

            return response([
                'data' => new CartResource($cart)
            ], Response::HTTP_CREATED);

        }catch(\Exseption $e){
             return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        return new CartResource($cart);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        try{

            $cart->update([
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);

            return response([
                'data' => new CartResource($cart)
            ], Response::HTTP_CREATED);

        }catch(\Exseption $e){
             return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        try{
            $cart->delete();
            return response(null, Response::HTTP_NO_CONTENT);

        }catch(\Exseption $e){
             return response()->json($e);
        }
    }
}
