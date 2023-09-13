<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => function() {

                return \App\Models\User::all()->random();
            },

            'product_id' => function() {

                return \App\Models\Product::all()->random();
            },

            'quantity' => $this->faker->numberBetween(0, 20)
        ];
    }
}
