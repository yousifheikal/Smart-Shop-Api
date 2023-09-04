<?php

namespace App\Repositories\RepositoryInterface\Products;

interface ProductsApiInterface
{
    public function getAllProducts();

    public function getSingleProduct($request);

    public function store($request);

    public function update($request);

    public function destroy($request);

    // public function truncateAllProduct();

    public function popularProduct();

    public function similarProducts();

    public function sortingASC();

    public function sortingDESC();

}
