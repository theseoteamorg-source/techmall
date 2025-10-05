<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariant>
 */
class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'name' => $this->faker->words(2, true),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'sku' => $this->faker->unique()->ean13(),
            'stock' => $this->faker->numberBetween(0, 100),
            'status' => $this->faker->boolean(90),
        ];
    }
}
