<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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

    public function productDetail(Product $product)
    {
        // For now, we'll pass a dummy product object to the view.
        // We will replace this with real data from the database later.
        $product = (object)[
            'name' => 'Elegant Product Name',
            'sku' => 'PROD-12345',
            'price' => 9999,
            'description' => 'This is a brief, engaging description of the product. It highlights the key features and benefits, enticing the customer to make a purchase.',
            'full_description' => 'This is the full, detailed description of the product. It can include multiple paragraphs, lists, and other formatting to provide a comprehensive overview of the product\'s features, benefits, and use cases.',
            'specifications' => [
                'Dimension' => '10x20x30 cm',
                'Weight' => '5 kg',
                'Material' => 'High-Quality Steel',
            ],
            'images' => [
                'https://via.placeholder.com/600x600.png/007bff/ffffff?text=Product+Image+1',
                'https://via.placeholder.com/600x600.png/007bff/ffffff?text=Product+Image+2',
                'https://via.placeholder.com/600x600.png/007bff/ffffff?text=Product+Image+3',
            ],
            'reviews' => [
                [
                    'reviewer' => 'Jane Doe',
                    'comment' => 'This product is amazing! I highly recommend it.',
                    'image' => 'https://via.placeholder.com/50',
                ]
            ]
        ];

        return view('shop.product-detail', compact('product'));
    }

    public function cart()
    {
        return view('shop.cart');
    }

    public function checkout()
    {
        return view('shop.checkout');
    }

    public function thankYou()
    {
        return view('shop.thank-you');
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
