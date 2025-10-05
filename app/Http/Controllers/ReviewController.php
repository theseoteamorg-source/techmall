<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        $review = $product->reviews()->make($request->only('comment', 'rating'));
        $review->user_id = auth()->id();
        $review->save();

        return back()->with('success', 'Review submitted successfully!');
    }
}
