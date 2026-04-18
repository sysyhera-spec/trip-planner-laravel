<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Trip;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transport>
 */
class TransportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['train', 'avion', 'voiture'];
        $pricing = ['per_person', 'fixed'];
        
        return [
             'trip_id' => Trip::factory(),
            'type' => $this->faker->randomElement($types),
            'pricing_type' => $this->faker->randomElement($pricing),
            'price' => rand(20, 500),
        ];
    }
}
