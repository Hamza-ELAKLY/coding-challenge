<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class ProductController extends Controller
{
    protected $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function index()
    {
        $products = $this->productRepo->all();
        return response()->json($products);
    }

    //api requests
    public function apiStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $product = $this->productRepo->create($validated);

        return response()->json($product, 201);
    }

    //web requests
    public function webStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $product = $this->productRepo->create($validated);

        return Redirect::route('products.create')->with('success', 'Product created successfully.');
    }

    public function filterByCategory($categoryId)
    {
        $products = $this->productRepo->filterByCategory($categoryId);
        return response()->json($products);
    }

    public function sortByPrice($order)
    {
        $products = $this->productRepo->sortByPrice($order);
        return response()->json($products);
    }
}
