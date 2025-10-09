<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::paginate(12);
        $sliders = Slider::all();
        $categories = Category::all();
        $brands = Brand::all();
        return view('shop.index', compact('products', 'sliders', 'categories', 'brands'));
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
