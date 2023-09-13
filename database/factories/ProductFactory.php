<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model =  \App\Models\Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {

        return [
            'category_id' => function() {

                return \App\Models\Category::all()->random();
            },
            'name' => $this->faker->word(),
            'detail' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(100, 20000),
            'stock' => $this->faker->randomDigit(),
            'discount' => $this->faker->numberBetween(2, 70),
            'user_id' => function() {

                return \App\Models\User::all()->random();
            },
        ];
    }
}
