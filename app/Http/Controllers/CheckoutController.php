<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethod::where('status', 1)->get();
        return view('checkout.index', compact('paymentMethods'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'payment_method' => 'required',
        ]);

        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        $coupon = session()->get('coupon');
        $discount = 0;
        $couponCode = null;

        if ($coupon) {
            $couponCode = $coupon['code'];
            if ($coupon['type'] == 'fixed') {
                $discount = $coupon['value'];
            } else {
                $discount = ($total * $coupon['value'] / 100);
            }
            $total -= $discount;
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'total' => $total,
            'coupon_code' => $couponCode,
            'discount' => $discount,
            'payment_method' => $request->payment_method,
        ]);

        foreach ($cart as $id => $details) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $details['quantity'],
                'price' => $details['price'],
            ]);
        }

        session()->forget('cart');
        session()->forget('coupon');

        return redirect()->route('shop.thank-you')->with('success', 'Order placed successfully!');
    }
}
