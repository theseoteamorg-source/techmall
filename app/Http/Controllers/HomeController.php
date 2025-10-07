<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Spatie\SchemaOrg\Schema;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $brands = Brand::all();
        $sliders = Slider::all();
        $siteSchema = Schema::webSite()->url(url('/'))->name('E-commerce');

        return view('welcome', compact('products', 'brands', 'sliders', 'siteSchema'));
    }
}
