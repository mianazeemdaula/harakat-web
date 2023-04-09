<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use MatanYadaev\EloquentSpatial\Objects\Point;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->jobTitle(),
            'address' => fake()->address(),
            'user_id' => fake()->numberBetween(20,31),
            'location' => new Point(fake()->latitude($min = 30.670258, $max = 30.679375), fake()->longitude($min = 73.638012, $max = 73.679334)),
        ];
    }
}
