<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(Product $product)
    {
        return view('reviews.create', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $review = $product->reviews()->make($request->only('comment', 'rating'));
        $review->user_id = auth()->id();
        $review->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('reviews', 'public');
                $review->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('products.show', $product)->with('success', 'Review submitted successfully!');
    }
}
