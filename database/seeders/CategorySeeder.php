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

        Category::create(['name' => 'Cases & Covers', 'slug' => 'cases-covers']);
        Category::create(['name' => 'Screen Protectors', 'slug' => 'screen-protectors']);
        Category::create(['name' => 'Chargers & Cables', 'slug' => 'chargers-cables']);
        Category::create(['name' => 'Power Banks', 'slug' => 'power-banks']);
        Category::create(['name' => 'Headphones & Earphones', 'slug' => 'headphones-earphones']);
    }
}
