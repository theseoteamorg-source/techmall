<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout.index');
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart');
        $total = 0;

        foreach ($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        $order = Order::create([
            'user_id' => 1, // Hardcoded user ID
            'total' => $total,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
        ]);

        foreach ($cart as $id => $details) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $details['quantity'],
                'price' => $details['price'],
            ]);
        }

        // Clear the cart
        session()->forget('cart');

        return redirect()->route('checkout.success');
    }

    public function success()
    {
        return view('checkout.success');
    }
}
