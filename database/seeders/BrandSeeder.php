<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::truncate();

        Brand::create(['name' => 'Apple', 'slug' => 'apple', 'logo' => 'https://via.placeholder.com/150x50']);
        Brand::create(['name' => 'Samsung', 'slug' => 'samsung', 'logo' => 'https://via.placeholder.com/150x50']);
        Brand::create(['name' => 'Nike', 'slug' => 'nike', 'logo' => 'https://via.placeholder.com/150x50']);
        Brand::create(['name' => 'Penguin Books', 'slug' => 'penguin-books', 'logo' => 'https://via.placeholder.com/150x50']);
    }
}
