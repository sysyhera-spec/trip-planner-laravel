<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Destination;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'destination_id' => Destination::factory(),
            'title' => $this->faker->sentence(2),
            'day' => $this->faker->dateTimeBetween('+1 days', '+1 year')->format('Y-m-d'),
            'duration_minutes' => rand(30, 240),
            'price_per_person' => rand(10, 200),
        ];
    }
}
