<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function home()
    {
        return view('shop.home');
    }

    public function products()
    {
        return 'This is the Products Page';
    }

    public function productDetail($product)
    {
        return "This is the detail page for product: {$product}";
    }

    public function cart()
    {
        return 'This is the Shopping Cart';
    }

    public function checkout()
    {
        return 'This is the Checkout Page';
    }

    public function dashboard()
    {
        return 'This is the User Dashboard';
    }

    public function profile()
    {
        return 'This is the User Profile Page';
    }
}
