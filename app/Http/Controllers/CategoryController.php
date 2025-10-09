<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Category $category)
    {
        $productsQuery = $category->products();

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

        return view('category.show', compact('category', 'products'));
    }
}
