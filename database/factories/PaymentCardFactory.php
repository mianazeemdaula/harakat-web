<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentCard>
 */
class PaymentCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'user_id' => fake()->numberBetween(21,31), 
          'holder_name' => fake()->name(), 
          'card_no' => fake()->creditCardNumber(), 
          'expiry_month' => '08', 
          'expiry_year' => '24', 
          'cvc' => fake()->randomNumber(3, true), 
        ];
    }
}
