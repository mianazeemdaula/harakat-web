<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->numberBetween(1,30),
            'rating' => fake()->randomFloat(1,1.0,5.0),
            'description' => fake()->sentence(2),
            'reviewable_type' =>fake()->randomElement(['App\Models\User','App\Models\Product']),
            'reviewable_id' => fake()->numberBetween(1,30),
        ];
    }
}
