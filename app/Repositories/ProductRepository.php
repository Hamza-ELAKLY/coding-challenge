<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function all()
    {
        return Product::with('categories')->get();
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function filterByCategory($categoryId)
    {
        return Product::whereHas('categories', function($query) use ($categoryId) {
            $query->where('categories.id', $categoryId);
        })->get();
    }

    public function sortByPrice($order)
    {
        return Product::orderBy('price', $order)->get();
    }
}
