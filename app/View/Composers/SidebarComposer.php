<?php

namespace App\View\Composers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class SidebarComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $allCategories = Category::all();
        
        // Default price range (all products)
        $minPrice = Product::min('price');
        $maxPrice = Product::max('price');

        // Get the current category from the route
        $category = request()->route('category');

        if ($category instanceof \App\Models\Category) {
             // If on a category page, get price range for that category
            $minPrice = $category->products()->min('price');
            $maxPrice = $category->products()->max('price');
        } 

        $view->with('allCategories', $allCategories)
             ->with('minPrice', $minPrice)
             ->with('maxPrice', $maxPrice);
    }
}
