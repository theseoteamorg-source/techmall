<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Brand;
use App\Models\Category;
use Spatie\SchemaOrg\Schema;

class ShopController extends Controller
{
    public function home()
    {
        $sliders = Slider::all();
        $products = Product::all();
        $brands = Brand::all();

        $siteSchema = Schema::webSite()
            ->url(url('/'))
            ->name(config('app.name'))
            ->description('E-commerce website')
            ->inLanguage('en-US')
            ->publisher(Schema::organization()->name(config('app.name')));

        return view('welcome', compact('sliders', 'products', 'brands', 'siteSchema'));
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
                    ->url(route('products.show', $product))
            );

        $breadcrumbsSchema = Schema::breadcrumbList()
            ->itemListElement([
                Schema::listItem()->position(1)->item(Schema::thing()->name('Home')->url(url('/'))),
                Schema::listItem()->position(2)->item(Schema::thing()->name('Products')->url(route('products.index'))),
                Schema::listItem()->position(3)->item(Schema::thing()->name($product->name)->url(route('products.show', $product))),
            ]);

        return view('products.show', compact('product', 'productSchema', 'breadcrumbsSchema'));
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
