<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->numberBetween(1,10),
            'product_category_id' => fake()->numberBetween(1,10),
            'name' => fake()->word(),
            'name_ar' => fake()->word(),
            'price' => fake()->randomFloat(2, 5, 10),
            'promo_price' => fake()->randomFloat(2, 5, 10),
            'vat' => fake()->randomFloat(2, 5, 10),
            'prepration_time' => fake()->numberBetween(10,50),
            'description' => fake()->paragraph(),
            'weight' => fake()->numberBetween(1,4000),
            'image' => fake()->imageUrl(640, 480, 'product', true),
        ];
    }
}
