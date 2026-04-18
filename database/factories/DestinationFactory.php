<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class DestinationFactory extends Factory
{
    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('now', '+6 months');
        $end = (clone $start);
        $end->modify('+' . $this->faker->numberBetween(1, 7) . ' days');

        return [
            'name' => $this->faker->city(),
            'starts_at' => $start->format('Y-m-d'),
            'ends_at' => $end->format('Y-m-d'),
            'trip_id' => \App\Models\Trip::factory(),
        ];
    }
}
