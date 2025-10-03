<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::truncate();

        Product::create([
            'name' => 'Apple 20W USB-C Power Adapter',
            'slug' => 'apple-20w-usb-c-power-adapter',
            'description' => 'The Apple 20W USB-C Power Adapter offers fast, efficient charging at home, in the office, or on the go.',
            'price' => 19.00,
            'category_id' => 1,
            'brand_id' => 1,
            'image' => 'https://images.unsplash.com/photo-1588665564283-16086e64177c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        ]);

        Product::create([
            'name' => 'Samsung 45W USB-C Wall Charger',
            'slug' => 'samsung-45w-usb-c-wall-charger',
            'description' => 'Give your devices the powerful charging support they deserve. The Wall Charger for Super Fast Charging (45W) provides Super Fast Charging at up to 45W for capable devices.',
            'price' => 49.99,
            'category_id' => 1,
            'brand_id' => 2,
            'image' => 'https://images.unsplash.com/photo-1618384887928-16ec33434542?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        ]);

        Product::create([
            'name' => 'Apple AirPods Pro (2nd Generation)',
            'slug' => 'apple-airpods-pro-2nd-generation',
            'description' => 'The Apple AirPods Pro (2nd Generation) have been re-engineered for even richer audio experiences. Next-level Active Noise Cancellation and Adaptive Transparency reduce more external noise.',
            'price' => 249.00,
            'category_id' => 2,
            'brand_id' => 1,
            'image' => 'https://images.unsplash.com/photo-1609249789396-d1fda59a4431?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        ]);

        Product::create([
            'name' => 'Razer Blade 15 Gaming Laptop',
            'slug' => 'razer-blade-15-gaming-laptop',
            'description' => 'The Razer Blade 15 is a compact gaming laptop with a powerful NVIDIA GeForce RTX 30-series GPU, 12th Gen Intel Core i9 processor, and a QHD 240Hz display.',
            'price' => 2999.99,
            'category_id' => 4,
            'brand_id' => 4,
            'image' => 'https://images.unsplash.com/photo-1593642702821-c8da67585048?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        ]);

        Product::create([
            'name' => 'Google Pixel 7 Pro',
            'slug' => 'google-pixel-7-pro',
            'description' => 'The Google Pixel 7 Pro is the most powerful Pixel phone yet, with a Google Tensor G2 processor, a pro-level camera system, and a beautiful 6.7-inch QHD+ 120Hz display.',
            'price' => 899.00,
            'category_id' => 3,
            'brand_id' => 3,
            'image' => 'https://images.unsplash.com/photo-1667148174787-0b7c46f6b7c5?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        ]);

        Product::create([
            'name' => 'Logitech G Pro X Superlight',
            'slug' => 'logitech-g-pro-x-superlight',
            'description' => 'The Logitech G Pro X Superlight is a lightweight wireless gaming mouse with a HERO 25K sensor and a long-lasting battery.',
            'price' => 159.99,
            'category_id' => 5,
            'brand_id' => 5,
            'image' => 'https://images.unsplash.com/photo-1615664119641-3b6313175865?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        ]);
    }
}
