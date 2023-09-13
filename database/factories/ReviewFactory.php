<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    protected $model =  \App\Models\Review::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => function() {

                return \App\Models\Product::all()->random();
            },

            'customer' => $this->faker->name(),
            'review' => $this->faker->paragraph(),
            'star' => $this->faker->numberBetween(0, 5)
        ];
    }
}
