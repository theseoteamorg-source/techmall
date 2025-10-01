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
            'image' => 'https://images.unsplash.com/photo-1510557880182-3d4d3cba35a5?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        ]);

        Product::create([
            'name' => 'Air Force 1',
            'slug' => 'air-force-1',
            'description' => 'Classic Nike sneakers.',
            'price' => 120.00,
            'category_id' => 2,
            'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        ]);

        Product::create([
            'name' => 'The Great Gatsby',
            'slug' => 'the-great-gatsby',
            'description' => 'A classic novel by F. Scott Fitzgerald.',
            'price' => 15.99,
            'category_id' => 3,
            'image' => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        ]);
    }
}
