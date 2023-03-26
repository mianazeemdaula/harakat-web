<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
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
            'title' => fake()->company(),
            'code' => fake()->swiftBicNumber(),
            'start_date' => fake()->dateTime(),
            'expire_date' => fake()->dateTime(),
            'min_purchase' => fake()->randomFloat(2, 10, 20),
            'max_discount' => fake()->randomFloat(2, 5, 10),
            'discount' => fake()->randomFloat(1, 2, 10),
            'limit' => fake()->numberBetween(5,10),
            'status' => fake()->boolean(),
            'image' => fake()->imageUrl(640, 480, 'product', true),
        ];
    }
}
