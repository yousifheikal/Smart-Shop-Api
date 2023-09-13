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

    public function getSingleProduct($id){

        return $this->product->getSingleProduct($id);
    }


    public function store(Request $request){

        return $this->product->store($request);
    }

    public function update(Request $request, $id){

        return $this->product->update($request, $id);
    }

    public function destroy($id){

        return $this->product->destroy($id);
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

    public function getProductsWithCategory($id){

        return $this->product->getProductsWithCategory($id);
    }

}
