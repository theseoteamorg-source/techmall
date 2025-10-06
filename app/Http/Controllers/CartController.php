<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function add(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/150'
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
        return redirect()->back();
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
        return redirect()->back();
    }

    public function applyCoupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required',
        ]);

        $coupon = Coupon::where('code', $request->coupon_code)->first();

        if (!$coupon) {
            return redirect()->back()->withErrors(['coupon_code' => 'Invalid coupon code.']);
        }

        if ($coupon->expires_at && $coupon->expires_at < now()) {
            return redirect()->back()->withErrors(['coupon_code' => 'Coupon has expired.']);
        }

        session()->put('coupon', [
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
        ]);

        return redirect()->back()->with('success', 'Coupon applied successfully.');
    }

    public function removeCoupon()
    {
        session()->forget('coupon');

        return redirect()->back()->with('success', 'Coupon removed successfully.');
    }
}
