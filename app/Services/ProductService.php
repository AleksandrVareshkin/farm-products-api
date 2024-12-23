<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    /**
     * Retrieve a list of products based on provided filters.
     *
     * @param array $filters
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getProducts($filters)
    {
        $query = Product::query();

        // Filter by product name (partial match)
        if (isset($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }

        // Filter by minimum price
        if (isset($filters['min_price'])) {
            $query->where('price', '>=', $filters['min_price']);
        }

        // Filter by maximum price
        if (isset($filters['max_price'])) {
            $query->where('price', '<=', $filters['max_price']);
        }

        // Filter by stock availability
        if (isset($filters['in_stock'])) {
            $inStock = filter_var($filters['in_stock'], FILTER_VALIDATE_BOOLEAN);
            $query->where('quantity', $inStock ? '>' : '=', 0);
        }

        return $query->get();
    }

    /**
     * Create a new product with the provided data.
     *
     * @param array $data
     * @return \App\Models\Product
     */
    public function createProduct($data)
    {
        return Product::create($data);
    }

    /**
     * Update an existing product by its ID.
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Product
     */
    public function updateProduct($id, $data)
    {
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
    }

    /**
     * Delete a product by its ID.
     *
     * @param int $id
     * @return void
     */
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    }
}
