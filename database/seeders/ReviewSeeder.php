<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::truncate();

        $users = User::all();
        $products = Product::all();

        foreach ($products as $product) {
            foreach ($users as $user) {
                if (rand(0, 1)) {
                    $product->reviews()->create([
                        'user_id' => $user->id,
                        'comment' => fake()->realText(),
                        'rating' => rand(1, 5),
                    ]);
                }
            }
        }
    }
}
