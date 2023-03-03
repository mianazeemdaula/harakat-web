<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use MatanYadaev\EloquentSpatial\Objects\Point;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class MerchantFactory extends Factory
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
            'city_id' => fake()->numberBetween(1,8),
            'category_id' => fake()->numberBetween(1,4),
            'shop_name' => fake()->name(),
            'phone' => fake()->phoneNumber(),
            'base_delivery_charges' => fake()->randomFloat(1, 1, 2),
            'delivery_charges_km' => fake()->randomFloat(1, 2, 10),
            'min_order_amount' => fake()->randomFloat(2, 20, 30),
            'delivery_radius' => fake()->randomFloat(2, 5, 10),
            // 'prepration_time' => fake()->time(),
            // 'min_delivery_time' => fake()->time(),
            // 'max_delivery_time' => fake()->time(),
            'address' => fake()->address(),
            'location' => new Point(fake()->latitude($min = 30.670258, $max = 30.679375), fake()->longitude($min = 73.638012, $max = 73.679334)),
            'status' => 'active',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
