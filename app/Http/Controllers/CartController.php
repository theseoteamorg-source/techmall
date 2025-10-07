<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::getContent();
        return view('cart.index', compact('cartItems'));
    }

    public function add(Product $product, Request $request)
    {

        $request->validate([
            'quantity' => 'required|numeric|min:1',
            'variant_id' => 'nullable|exists:variants,id'
        ]);

        // add the product to cart
        Cart::add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $product->image_url,
                'variant_id' => $request->variant_id,
            )
        ));

        return redirect()->route('shop.home')->with('success', 'Product added to cart successfully!');
    }

    public function buyNow(Product $product, Request $request)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1',
            'variant_id' => 'nullable|exists:variants,id'
        ]);

        // add the product to cart
        Cart::add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $product->image_url,
                'variant_id' => $request->variant_id,
            )
        ));

        return redirect()->route('checkout.index');
    }
}
