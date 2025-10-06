<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Slider;
use Illuminate\Http\Request;
use Spatie\SchemaOrg\Schema;

class ShopController extends Controller
{
    public function home()
    {
        $sliders = Slider::all();
        $brands = Brand::all()->take(10);
        $categories = Category::with(['products' => function ($query) {
            $query->take(4);
        }])->get();
        $reviews = Review::latest()->take(5)->get();

        $siteSchema = Schema::webSite()
            ->url(url('/'))
            ->name(config('app.name'))
            ->description('E-commerce website')
            ->inLanguage('en-US')
            ->publisher(Schema::organization()->name(config('app.name')));

        return view('shop.home', compact('sliders', 'categories', 'reviews', 'siteSchema', 'brands'));
    }

    public function index(Request $request)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::query();

        if ($request->has('search')) {
            $products->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('min_price')) {
            $products->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $products->where('price', '<=', $request->max_price);
        }

        if ($request->has('sort')) {
            if ($request->sort == 'price_asc') {
                $products->orderBy('price', 'asc');
            } elseif ($request->sort == 'price_desc') {
                $products->orderBy('price', 'desc');
            } elseif ($request->sort == 'newness') {
                $products->latest();
            }
        }

        $products = $products->paginate(12);

        return view('shop.index', compact('products', 'categories', 'brands'));
    }

    public function category(Request $request, Category $category)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $products = $category->products();

        if ($request->filled('min_price')) {
            $products->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $products->where('price', '<=', $request->max_price);
        }

        if ($request->has('sort')) {
            if ($request->sort == 'price_asc') {
                $products->orderBy('price', 'asc');
            } elseif ($request->sort == 'price_desc') {
                $products->orderBy('price', 'desc');
            } elseif ($request->sort == 'newness') {
                $products->latest();
            }
        }

        $products = $products->paginate(12);

        return view('shop.category', compact('products', 'category', 'categories', 'brands'));
    }

    public function brand(Request $request, Brand $brand)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $products = $brand->products();

        if ($request->filled('min_price')) {
            $products->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $products->where('price', '<=', $request->max_price);
        }

        if ($request->has('sort')) {
            if ($request->sort == 'price_asc') {
                $products->orderBy('price', 'asc');
            } elseif ($request->sort == 'price_desc') {
                $products->orderBy('price', 'desc');
            } elseif ($request->sort == 'newness') {
                $products->latest();
            }
        }

        $products = $products->paginate(12);

        return view('shop.brand', compact('products', 'brand', 'categories', 'brands'));
    }

    public function product(Product $product)
    {
        $productSchema = Schema::product()
            ->name($product->name)
            ->description($product->description)
            ->image($product->image_url)
            ->sku($product->sku)
            ->offers(
                Schema::offer()
                    ->price($product->price)
                    ->priceCurrency('USD')
                    ->availability('https://schema.org/InStock')
                    ->url(route('shop.product', $product))
            );

        $breadcrumbsSchema = Schema::breadcrumbList()
            ->itemListElement([
                Schema::listItem()->position(1)->item(Schema::thing()->name('Home')->url(url('/'))),
                Schema::listItem()->position(2)->item(Schema::thing()->name('Shop')->url(route('shop.index'))),
                Schema::listItem()->position(3)->item(Schema::thing()->name($product->name)->url(route('shop.product', $product))),
            ]);

        return view('shop.product', compact('product', 'productSchema', 'breadcrumbsSchema'));
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
