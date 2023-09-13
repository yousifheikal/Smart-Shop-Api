<?php

namespace App\Repositories\RepositoryClasses\products;

use App\ApiTrait\GeneralTrait;
use App\Models\Product;
use App\Repositories\RepositoryInterface\Products\ProductsApiInterface;
use Illuminate\Support\Facades\Validator;

class ProductsApi implements ProductsApiInterface
{
    //Trait using returen all response Api
    use GeneralTrait;

    public function getAllProducts(){

        $Products = Product::all();

        return $this->returnData('allProducts', $Products, 'Products successfully retrieved');
    }

    public function getSingleProduct($id){

        $product = Product::findOrfail($id);

        return $this->returnData('singleProduct', $product, 'Product successfully retrieved');
    }


    public function store($request)
    {
        //Validation data before Add
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'name' => 'required|max:100',
            'description' => 'required',
            'regular_price' => 'required',
            'sale_price' => 'required',
            'image' => 'required',
            'color' => 'required',
            'size' => 'required',
            'stock_status' => 'required',
        ]);

        //if any errors for validate show this error
        if ($validator->fails())
            return $this->returnError('404', $validator->errors());


        $product = Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'regular_price' => $request->regular_price,
            'sale_price' => $request->sale_price,
            'image' => $request->image,
            'color' => $request->color,
            'size' => $request->size,
            'stock_status' => $request->stock_status,
        ]);

        return $this->returnSuccessMessage('200', 'Product successfully added');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($request, $id)
    {
        //Validation data before update
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'name' => 'required|max:100',
            'description' => 'required',
            'regular_price' => 'required',
            'sale_price' => 'required',
            'image' => 'required',
            'color' => 'required',
            'size' => 'required',
            'stock_status' => 'required',
        ]);

        //if any errors for validate show this error
        if ($validator->fails())
            return $this->returnError('404', $validator->errors());

        $product = Product::findOrfail($id);

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'regular_price' => $request->regular_price,
            'sale_price' => $request->sale_price,
            'image' => $request->image,
            'color' => $request->color,
            'size' => $request->size,
            'stock_status' => $request->stock_status,
        ]);
        return $this->returnSuccessMessage('200', 'Product successfully updated');
    }

    public function destroy($id)
    {
        //data selected for deleted
        Product::findOrfail($id)->delete();

        //return success msg
        return $this->returnSuccessMessage('200', 'Product successfully deleted');
    }

    // public function truncateAllProduct()
    // {
    //     $product = product::all();
    //     $product->delete();
    //     return $this->returnSuccessMessage('200', 'All-Product successfully deleted');
    // }

    public function popularProduct()
    {
        $popular_products = Product::inRandomOrder()->limit(8)->get();

        return $this->returnData('popular-products', $popular_products, 'Popular Products successfully retrieved');
    }

    public function similarProducts()
    {
        $similar_products = Product::inRandomOrder()->limit(4)->get();

        return $this->returnData('similar-products', $similar_products, 'similar products successfully retrieved');
    }

    public function sortingASC()
    {
        $lowest_price =  Product::orderBy('regular_price', 'asc')->get();

        return $this->returnData('lowest price', $lowest_price, 'lowest_price successfully retrieved');
    }

    public function sortingDESC()
    {
        $highest_price =  Product::orderBy('regular_price', 'desc')->get();

        return $this->returnData('highest price', $highest_price, 'highest_price successfully retrieved');
    }

    public function getProductsWithCategory($id)
    {
        $productsWithCategory = Product::where('category_id', $id)->get();

        return $this->returnData('productsWithCategory', $productsWithCategory, 'productsWithCategory successfully retrieved');

    }


}
