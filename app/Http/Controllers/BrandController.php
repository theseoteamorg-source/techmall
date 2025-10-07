<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function show(Request $request, Brand $brand)
    {
        $productsQuery = $brand->products();

        switch ($request->get('sort')) {
            case 'price_asc':
                $productsQuery->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $productsQuery->orderBy('price', 'desc');
                break;
            case 'newness':
                $productsQuery->orderBy('created_at', 'desc');
                break;
            default:
                // No sorting
                break;
        }

        $products = $productsQuery->paginate(12);

        return view('brand.show', compact('brand', 'products'));
    }
}
