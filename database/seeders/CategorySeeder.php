<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::truncate();

        Category::create(['name' => 'Electronics', 'slug' => 'electronics']);
        Category::create(['name' => 'Clothing', 'slug' => 'clothing']);
        Category::create(['name' => 'Books', 'slug' => 'books']);
        Category::create(['name' => 'Gaming', 'slug' => 'gaming']);
        Category::create(['name' => 'Mobiles', 'slug' => 'mobiles']);
        Category::create(['name' => 'Accessories', 'slug' => 'accessories']);
    }
}
