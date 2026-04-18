<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
                $start = $this->faker->dateTimeBetween('now', '+6 months');
        $end = (clone $start);
        $end->modify('+' . $this->faker->numberBetween(2, 14) . ' days');

        return [
            'title' => $this->faker->city(),
            'description' => $this->faker->optional()->paragraph(),
            'starts_at' => $start->format('Y-m-d'),
            'ends_at' => $end->format('Y-m-d'),
            'people_count' => $this->faker->numberBetween(1, 6),
            'user_id' => User::factory(),
        ];
    }
}
