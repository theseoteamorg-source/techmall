<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Review;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::truncate();
        ProductVariant::truncate();
        Review::truncate();

        // Spigen Cases
        $spigenCase = Product::create([
            'name' => 'Spigen Thin Fit Case for iPhone 14',
            'slug' => 'spigen-thin-fit-case-for-iphone-14',
            'description' => 'The Thin Fit case for the iPhone 14 is a slim and lightweight case that provides everyday protection against scratches and drops.',
            'price' => 19.99,
            'category_id' => 1,
            'brand_id' => 1,
            'image' => 'https://via.placeholder.com/640x480.png/000000?text=Spigen+Case',
            'product_type' => 'variable',
        ]);

        ProductVariant::create([
            'product_id' => $spigenCase->id,
            'name' => 'Black',
            'price' => 19.99,
            'sku' => 'SPG-TF-IP14-BLK',
            'stock' => 100,
            'status' => true,
            'is_default' => true,
        ]);

        ProductVariant::create([
            'product_id' => $spigenCase->id,
            'name' => 'Gunmetal',
            'price' => 21.99,
            'sku' => 'SPG-TF-IP14-GUN',
            'stock' => 75,
            'status' => true,
        ]);

        ProductVariant::create([
            'product_id' => $spigenCase->id,
            'name' => 'Rose Gold',
            'price' => 22.99,
            'sku' => 'SPG-TF-IP14-ROS',
            'stock' => 50,
            'status' => true,
        ]);

        // Anker Power Bank
        $ankerPowerBank = Product::create([
            'name' => 'Anker PowerCore 10000',
            'slug' => 'anker-powercore-10000',
            'description' => 'One of the smallest and lightest 10000mAh portable chargers. Provides almost three-and-a-half iPhone 8 charges or two-and-a-half Galaxy S8 charges.',
            'price' => 25.99,
            'category_id' => 4,
            'brand_id' => 2,
            'image' => 'https://via.placeholder.com/640x480.png/0000FF?text=Anker+Power+Bank',
            'product_type' => 'variable',
        ]);

        ProductVariant::create([
            'product_id' => $ankerPowerBank->id,
            'name' => 'Black',
            'price' => 25.99,
            'sku' => 'ANK-PC-10K-BLK',
            'stock' => 200,
            'status' => true,
            'is_default' => true,
        ]);

        ProductVariant::create([
            'product_id' => $ankerPowerBank->id,
            'name' => 'White',
            'price' => 26.99,
            'sku' => 'ANK-PC-10K-WHT',
            'stock' => 150,
            'status' => true,
        ]);

        ProductVariant::create([
            'product_id' => $ankerPowerBank->id,
            'name' => 'Blue',
            'price' => 27.99,
            'sku' => 'ANK-PC-10K-BLU',
            'stock' => 100,
            'status' => true,
        ]);

        // Belkin Screen Protector
        $belkinScreenProtector = Product::create([
            'name' => 'Belkin UltraGlass Screen Protector for iPhone 14',
            'slug' => 'belkin-ultraglass-screen-protector-for-iphone-14',
            'description' => 'An ultra-impact-proof screen protector that provides twice the strength of tempered glass.',
            'price' => 39.99,
            'category_id' => 2,
            'brand_id' => 3,
            'image' => 'https://via.placeholder.com/640x480.png/FFFFFF?text=Belkin+Protector',
            'product_type' => 'variable',
        ]);

        ProductVariant::create([
            'product_id' => $belkinScreenProtector->id,
            'name' => 'Clear',
            'price' => 39.99,
            'sku' => 'BLK-UG-IP14-CLR',
            'stock' => 300,
            'status' => true,
            'is_default' => true,
        ]);

        ProductVariant::create([
            'product_id' => $belkinScreenProtector->id,
            'name' => 'Anti-Glare',
            'price' => 44.99,
            'sku' => 'BLK-UG-IP14-AG',
            'stock' => 150,
            'status' => true,
        ]);

        // Samsung Charger
        $samsungCharger = Product::create([
            'name' => 'Samsung 45W USB-C Wall Charger',
            'slug' => 'samsung-45w-usb-c-wall-charger',
            'description' => 'Give your devices the powerful charging support they deserve. The Wall Charger for Super Fast Charging (45W) provides Super Fast Charging at up to 45W for capable devices.',
            'price' => 49.99,
            'category_id' => 3,
            'brand_id' => 4,
            'image' => 'https://via.placeholder.com/640x480.png/000000?text=Samsung+Charger',
            'product_type' => 'variable',
        ]);

        ProductVariant::create([
            'product_id' => $samsungCharger->id,
            'name' => 'Charger Only',
            'price' => 49.99,
            'sku' => 'SAM-WC-45W-BLK-ONLY',
            'stock' => 120,
            'status' => true,
            'is_default' => true,
        ]);

        ProductVariant::create([
            'product_id' => $samsungCharger->id,
            'name' => 'Charger + Cable',
            'price' => 59.99,
            'sku' => 'SAM-WC-45W-BLK-CBL',
            'stock' => 80,
            'status' => true,
        ]);

        // Apple EarPods
        $appleEarPods = Product::create([
            'name' => 'Apple EarPods with Lightning Connector',
            'slug' => 'apple-earpods-with-lightning-connector',
            'description' => 'Unlike traditional, circular earbuds, the design of the EarPods is defined by the geometry of the ear. Which makes them more comfortable for more people than any other earbud-style headphones.',
            'price' => 19.00,
            'category_id' => 5,
            'brand_id' => 5,
            'image' => 'https://via.placeholder.com/640x480.png/FFFFFF?text=Apple+EarPods',
            'product_type' => 'variable',
        ]);

        ProductVariant::create([
            'product_id' => $appleEarPods->id,
            'name' => 'White',
            'price' => 19.00,
            'sku' => 'APL-EP-LTN-WHT',
            'stock' => 500,
            'status' => true,
            'is_default' => true,
        ]);

         ProductVariant::create([
            'product_id' => $appleEarPods->id,
            'name' => 'Black',
            'price' => 22.50,
            'sku' => 'APL-EP-LTN-BLK',
            'stock' => 300,
            'status' => true,
        ]);
    }
}
