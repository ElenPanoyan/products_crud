<?php

namespace App\Services;

use App\DTOs\ProductData;
use App\Repositories\ProductRepository;
use App\Contracts\ProductServiceInterface;

class ProductService implements ProductServiceInterface
{
    protected ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProducts()
    {
        return $this->productRepository->getProducts();
    }

    public function getProductByID(int $id)
    {
        return $this->productRepository->getProductByID($id);
    }

    public function createProduct(ProductData $productData)
    {
        return $this->productRepository->createProduct($productData);
    }

    public function updateProduct(ProductData $productData, int $id)
    {
        return $this->productRepository->updateProduct($productData, $id);
    }

    public function deleteProduct(int $id)
    {
        return $this->productRepository->deleteProduct($id);
    }
}
