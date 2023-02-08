<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' => fake()->numberBetween(1, 10),
            'period_id' => fake()->numberBetween(1, 10),
            'client_id' => fake()->numberBetween(1, 10),
            'check_in' => fake()->dateTimeBetween('-1 week'),
            'check_out' => fake()->dateTimeBetween('now', '+1 week'),
            'confirmation' => fake()->boolean()
        ];
    }
}
