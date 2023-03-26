<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AddonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word(),
            'name_ar' => fake()->word(),
            'price' => fake()->randomFloat(1,5,50),
            'available' => fake()->numberBetween(0,1),
            'description' => fake()->paragraph(1),
            'description_ar' => fake()->paragraph(1),
        ];
    }
}
