<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $categories = Category::with(['products' => function ($query) {
            $query->limit(4);
        }])->get();

        return view('home.index', compact('sliders', 'categories'));
    }
}
