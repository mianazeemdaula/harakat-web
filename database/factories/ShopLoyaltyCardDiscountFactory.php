<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ShopLoyaltyCardDiscountFactory extends Factory
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
            'loyalty_card_id' => fake()->numberBetween(1,3),
            'discount_percent' => fake()->numberBetween(2,20),
            'status' => 'active',
        ];
    }
}
