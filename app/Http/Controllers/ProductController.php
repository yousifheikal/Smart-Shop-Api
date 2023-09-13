<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\ApiTrait\GeneralTrait;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductCollection;

class ProductController extends Controller
{
    use GeneralTrait;

    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show', 'popularProduct');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return  ProductCollection::collection(Product::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        try{
            if(Auth::user()->user_type === "Admin"){

                $user = Auth::user()->id;
                $product = new Product;
                $product->category_id = $request->category_id;
                $product->name = $request->name;
                $product->detail = $request->detail;
                $product->price = $request->price;
                $product->stock = $request->stock;
                $product->discount = $request->discount;
                $product->user_id = $user;
                $product->save();

                return response([
                    'data' => new ProductResource($product)
                ], Response::HTTP_CREATED);
            }

            return $this->returnError('401', 'Not have premision to visit this route');
        }catch(\Exseption $e){
             return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //  Show 1 coulmn selected
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        //
        try{
            if(Auth::user()->user_type === "Admin"){

                $product->update($request->all());
                return response([
                    'data' => new ProductResource($product)
                ], Response::HTTP_CREATED);

            }

            return $this->returnError('401', 'Not have premision to visit this route');
        }catch(\Exseption $e){
             return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

        try{
            if(Auth::user()->user_type === "Admin"){
                $product->delete();
                return response(null, Response::HTTP_NO_CONTENT);
            }

            return $this->returnError('401', 'Not have premision to visit this route');
        }catch(\Exseption $e){
             return response()->json($e);
        }
    }

}
