<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function index()
    {
        $categories = $this->categoryRepo->all();
        return response()->json($categories);
    }
}
