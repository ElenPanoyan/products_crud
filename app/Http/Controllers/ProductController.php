<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Services\ProductService;
use Exception;    
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Get all products
     *
     * @return JsonResponse
     */
    public function getProducts(): JsonResponse
    {
        try {
            $products = $this->productService->getProducts();
            return response()->json(['products' => $products], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Get a product by ID
     *
     * @param int $id
     * @return JsonResponse
     */
    public function getProductById(int $id): JsonResponse
    {
        try {
            $product = $this->productService->getProductById($id);
            return response()->json(['product' => $product], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Create a new product
     *
     * @param ProductRequest $request
     * @return JsonResponse
     */
    public function createProduct(ProductRequest $request): JsonResponse
    {
        try {
            $product = $this->productService->createProduct($request->toProductData());

            return response()->json([
                'message' => 'Product created successfully', 
                'product' => $product
            ], Response::HTTP_CREATED);
        } catch (Exception $e) {
            return response()->json(['error'=> $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update an existing product
     *
     * @param ProductRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function updateProduct(ProductRequest $request, $id): JsonResponse
    {
        try {
            $product = $this->productService->updateProduct($request->toProductData(), $id);
        
            return response()->json([
                'message' => 'Product updated successfully', 
                'product' => $product
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['error'=> $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        } 
    }

    /**
     * Delete a product by ID
     *
     * @param int $id
     * @return JsonResponse
     */
    public function deleteProduct(int $id): JsonResponse
    {
        try {
            $this->productService->deleteProduct($id);
            
            return response()->json([
                'message' => 'Product deleted successfully'
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
