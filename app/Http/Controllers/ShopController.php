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

    public function products(Request $request)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::query();

        if ($request->has('search')) {
            $products->where('name', 'like', '%' . $request->search . '%');
        }

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

        $products = $products->get();

        return view('products.index', compact('products', 'categories', 'brands'));
    }

    public function productDetail(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function cart()
    {
        return view('shop.cart');
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
