<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = App::make('sitemap');

        // Add static pages
        $sitemap->add(URL::to('/'), now(), '1.0', 'daily');
        $sitemap->add(URL::to('/shop'), now(), '0.9', 'daily');
        $sitemap->add(URL::to('/contact'), now(), '0.8', 'monthly');

        // Add dynamic pages from models
        $products = Product::where('include_in_sitemap', true)->get();
        foreach ($products as $product) {
            $sitemap->add(URL::to("/shop/{$product->slug}"), $product->updated_at, '0.8', 'weekly');
        }

        $categories = Category::where('include_in_sitemap', true)->get();
        foreach ($categories as $category) {
            $sitemap->add(URL::to("/shop?category={$category->slug}"), $category->updated_at, '0.9', 'weekly');
        }

        $brands = Brand::where('include_in_sitemap', true)->get();
        foreach ($brands as $brand) {
            $sitemap->add(URL::to("/shop?brand={$brand->slug}"), $brand->updated_at, '0.9', 'weekly');
        }

        return $sitemap->render('xml');
    }
}
