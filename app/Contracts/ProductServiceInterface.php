<?php

namespace App\Contracts;

use App\DTOs\ProductData;

interface ProductServiceInterface
{
    public function getProducts();

    public function getProductById(int $id);

    public function createProduct(ProductData $productData);

    public function updateProduct(ProductData $productData, int $id);

    public function deleteProduct(int $id);
}