<?php

namespace App\Repositories\RepositoryInterface\Products;

interface ProductsApiInterface
{
    public function getAllProducts();

    public function getSingleProduct($id);

    public function store($request);

    public function update($request, $id);

    public function destroy($id);

    // public function truncateAllProduct();

    public function popularProduct();

    public function similarProducts();

    public function sortingASC();

    public function sortingDESC();

    public function getProductsWithCategory($id);
}
