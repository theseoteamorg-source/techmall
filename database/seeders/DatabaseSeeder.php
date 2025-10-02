<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Slider;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminUserSeeder::class);
        $this->call(BrandSeeder::class);

        Category::factory(10)->create()->each(function ($category) {
            Product::factory(10)->create([
                'category_id' => $category->id,
                'brand_id' => Brand::inRandomOrder()->first()->id,
            ]);
        });

        Slider::factory(3)->create();
    }
}
