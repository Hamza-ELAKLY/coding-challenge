<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function create(array $data)
    {
        return Category::create($data);
    }

    public function all()
    {
        return Category::all();
    }

    public function find($id)
    {
        return Category::find($id);
    }
}
