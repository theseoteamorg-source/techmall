<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function add(Request $request, Product $product)
    {
        $variantId = $request->input('variant_id');
        $quantity = $request->input('quantity', 1);

        $cart = session()->get('cart', []);

        $cartKey = $variantId ? $product->id . '-' . $variantId : $product->id;

        if(isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $quantity;
        } else {
            if($variantId) {
                $variant = ProductVariant::find($variantId);
                $cart[$cartKey] = [
                    "name" => $product->name . ' (' . $variant->name . ')',
                    "quantity" => $quantity,
                    "price" => $variant->price,
                    "image" => $product->image
                ];
            } else {
                $cart[$cartKey] = [
                    "name" => $product->name,
                    "quantity" => $quantity,
                    "price" => $product->price,
                    "image" => $product->image
                ];
            }
        }

        session()->put('cart', $cart);

        if ($request->input('action') == 'buy_now') {
            return redirect()->route('cart.index')->with('success', 'Product added to cart!');
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function remove(Product $product)
    {
        $cart = session()->get('cart');
        if(isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }

    public function update(Request $request, Product $product)
    {
        $cart = session()->get('cart');
        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Cart updated successfully!');
    }
}
