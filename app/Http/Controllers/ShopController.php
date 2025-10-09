<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query()
            ->when($request->filled('category'), function ($query) use ($request) {
                $query->whereHas('category', function ($q) use ($request) {
                    $q->where('slug', $request->category);
                });
            })
            ->when($request->filled('brand'), function ($query) use ($request) {
                $query->whereHas('brand', function ($q) use ($request) {
                    $q->where('slug', $request->brand);
                });
            })
            ->when($request->filled('sort'), function ($query) use ($request) {
                match ($request->sort) {
                    'price_asc' => $query->orderBy('price', 'asc'),
                    'price_desc' => $query->orderBy('price', 'desc'),
                    'newness' => $query->latest(),
                    default => $query,
                };
            })
            ->paginate(12);

        $categories = Category::all();
        $brands = Brand::all();

        return view('shop.index', compact('products', 'categories', 'brands'));
    }

    public function product(Product $product)
    {
        $product->load('variants', 'reviews.user', 'images');
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get();

        return view('shop.product', compact('product', 'relatedProducts'));
    }
}
