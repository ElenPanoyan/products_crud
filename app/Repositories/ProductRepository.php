<?php

namespace App\Repositories;

use App\DTOs\ProductData;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductRepository
{
    public function getProducts()
    {
        return Product::with('category')->get();
    }

    public function getProductById(int $id): Product
    {
        return Product::with('category')->findOrFail($id);
    }

    public function createProduct(ProductData $productData): Product
    {
        $product = new Product();

        $this->fillProductData($product, $productData);
        $product->sku = $this->generateUniqueSku();
        $product->save();

        return $product;
    }

    private function fillProductData(Product $product, ProductData $productData): void
    {
        $product->title = $productData->title;
        $product->description = $productData->description;
        $product->price = $productData->price;
        $product->category_id = $productData->category_id;
    }

    private function generateUniqueSku(): string
    {
        do {
            $sku = strtoupper(Str::random(8));
        } while (Product::where('sku', $sku)->exists());

        return $sku;
    }

    public function updateProduct(ProductData $productData, int $id): Product
    {
        $product = Product::findOrFail($id);

        $this->fillProductData($product, $productData);
        $product->save();

        return $product;
    }

    public function deleteProduct(int $id): void
    {
        Product::findOrFail($id)->delete();
    }
}
