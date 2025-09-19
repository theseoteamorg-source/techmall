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
        Product::create([
            'name' => 'iPhone 15',
            'slug' => 'iphone-15',
            'description' => 'The latest iPhone from Apple.',
            'price' => 999.99,
            'category_id' => 1,
            'brand_id' => 1,
            'image' => 'https://picsum.photos/id/1/200/300',
        ]);

        Product::create([
            'name' => 'Air Force 1',
            'slug' => 'air-force-1',
            'description' => 'Classic Nike sneakers.',
            'price' => 120.00,
            'category_id' => 2,
            'brand_id' => 2,
            'image' => 'https://picsum.photos/id/2/200/300',
        ]);

        Product::create([
            'name' => 'The Great Gatsby',
            'slug' => 'the-great-gatsby',
            'description' => 'A classic novel by F. Scott Fitzgerald.',
            'price' => 15.99,
            'category_id' => 3,
            'brand_id' => 3,
            'image' => 'https://picsum.photos/id/3/200/300',
        ]);
    }
}
