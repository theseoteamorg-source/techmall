<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Currency;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category', 'brand');

        if ($request->has('category')) {
            $products->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->category);
            });
        }

        if ($request->has('brand')) {
            $products->whereHas('brand', function ($query) use ($request) {
                $query->where('slug', $request->brand);
            });
        }

        if ($request->has('search')) {
            $products->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $products->get();
        $categories = Category::all();
        $brands = Brand::all();
        
        $currencyCode = session('currency', 'USD');
        $currency = Currency::where('currency_code', $currencyCode)->first();

        return view('products.index', compact('products', 'categories', 'brands', 'currency'));
    }

    public function show(Product $product)
    {
        $currencyCode = session('currency', 'USD');
        $currency = Currency::where('currency_code', $currencyCode)->first();
        return view('products.show', compact('product', 'currency'));
    }
}
