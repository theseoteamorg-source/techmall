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

        Brand::create(['name' => 'Spigen', 'slug' => 'spigen', 'logo' => 'https://via.placeholder.com/150x50']);
        Brand::create(['name' => 'Anker', 'slug' => 'anker', 'logo' => 'https://via.placeholder.com/150x50']);
        Brand::create(['name' => 'Belkin', 'slug' => 'belkin', 'logo' => 'https://via.placeholder.com/150x50']);
        Brand::create(['name' => 'Samsung', 'slug' => 'samsung', 'logo' => 'https://via.placeholder.com/150x50']);
        Brand::create(['name' => 'Apple', 'slug' => 'apple', 'logo' => 'https://via.placeholder.com/150x50']);
    }
}
