<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Brand;
use App\Models\Category;

class ShopController extends Controller
{
    public function home()
    {
        $sliders = Slider::all();
        $products = Product::all();
        $brands = Brand::all();
        return view('welcome', compact('sliders', 'products', 'brands'));
    }

    public function products()
    {
        $products = Product::all();
        return view('shop.products', compact('products'));
    }

    public function productDetail(Product $product)
    {
        return view('shop.product-detail', compact('product'));
    }

    public function cart()
    {
        return view('shop.cart');
    }

    public function category(Category $category)
    {
        $products = $category->products;
        return view('shop.category', compact('category', 'products'));
    }

    public function addToCart(Request $request)
    {
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function checkout()
    {
        return view('shop.checkout');
    }

    public function thankYou()
    {
        return view('shop.thank-you');
    }

    public function dashboard()
    {
        return 'This is the User Dashboard';
    }

    public function profile()
    {
        return 'This is the User Profile Page';
    }
}
