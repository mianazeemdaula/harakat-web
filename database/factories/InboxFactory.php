<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class InboxFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->numberBetween(2,30),
            // 'page_key' => fake()->numberBetween(1,10),
            'title' => fake()->streetName(),
            'title_ar' => fake()->streetName(),
            'short_desc' => fake()->realText(50),
            'short_desc_ar' => fake()->realText(50),
            'content' => fake()->realText(250),
            'content_ar' => fake()->realText(250),
        ];
    }
}
