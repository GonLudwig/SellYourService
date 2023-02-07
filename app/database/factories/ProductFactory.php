<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'price_id' => fake()->numberBetween(1, 10),
            'started_display' => fake()->dateTimeBetween('-1 month'),
            'ended_display' => fake()->dateTimeBetween('now', '+1 week'),
        ];
    }
}
