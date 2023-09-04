<?php

namespace App\Http\Controllers\SmartShopApi\Products;

use App\Http\Controllers\Controller;
use App\Repositories\RepositoryInterface\Products\ProductsApiInterface;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //

    protected $product;

    public function __construct(ProductsApiInterface $product)
    {
        $this->product = $product;
    }


    public function getAllProducts(){

        return $this->product->getAllProducts();
    }

    public function getSingleProduct(Request $request){

        return $this->product->getSingleProduct($request);
    }


    public function store(Request $request){

        return $this->product->store($request);
    }

    public function update(Request $request){

        return $this->product->update($request);
    }

    public function destroy(Request $request){

        return $this->product->destroy($request);
    }

    // public function truncateAllProduct(){

    //     return $this->product->truncateAllProduct();
    // }

    public function popularProduct(){

        return $this->product->popularProduct();
    }

    public function similarProducts(){

        return $this->product->similarProducts();
    }

    public function sortingASC(){

        return $this->product->sortingASC();
    }

    public function sortingDESC(){

        return $this->product->sortingDESC();
    }

}
