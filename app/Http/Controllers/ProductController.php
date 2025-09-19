<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::when(request('search'), function ($query) {
            $query->where('name', 'like', '%' . request('search') . '%');
        })->get();

        return view('welcome', ['products' => $products]);
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('product.show', ['product' => $product]);
    }
}
