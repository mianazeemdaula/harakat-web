<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
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
            'title' => fake()->sentence(2),
            'body' => fake()->swiftBicNumber(),
            'data' => json_encode(fake()->creditCardDetails()),
            'is_read' => fake()->boolean(),
        ];
    }
}
