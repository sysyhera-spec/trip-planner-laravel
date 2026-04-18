<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Trip;
use App\Models\Destination;
use App\Models\Activity;
use App\Models\Accommodation;
use App\Models\Transport;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Utilisateur de test avec identifiants fixes
        $testUser = User::factory()->create([
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => bcrypt('testtest'),
        ]);

        // Données pour l'utilisateur de test
        Trip::factory(5)->create(['user_id' => $testUser->id])
            ->each(function ($trip) {
                Destination::factory(rand(1,3))->create(['trip_id' => $trip->id])
                    ->each(function ($destination) {
                        Activity::factory(rand(1,5))->create(['destination_id' => $destination->id]);
                        Accommodation::factory(rand(0,2))->create(['destination_id' => $destination->id]);
                    });
                Transport::factory(rand(0,2))->create(['trip_id' => $trip->id]);
            });

        // Un deuxième utilisateur aléatoire
        User::factory()->create()->each(function ($user) {
            Trip::factory(3)->create(['user_id' => $user->id])
                ->each(function ($trip) {
                    Destination::factory(rand(1,3))->create(['trip_id' => $trip->id])
                        ->each(function ($destination) {
                            Activity::factory(rand(1,5))->create(['destination_id' => $destination->id]);
                            Accommodation::factory(rand(0,2))->create(['destination_id' => $destination->id]);
                        });
                    Transport::factory(rand(0,2))->create(['trip_id' => $trip->id]);
                });
        });
    }
}<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Trip;
use App\Models\Destination;
use App\Models\Activity;
use App\Models\Accommodation;
use App\Models\Transport;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(2)->create()->each(function ($user) {

            Trip::factory(5)->create([
                'user_id' => $user->id
            ])->each(function ($trip) {

                Destination::factory(rand(1,3))->create([
                    'trip_id' => $trip->id
                ])->each(function ($destination) {

                    Activity::factory(rand(1,5))->create([
                        'destination_id' => $destination->id
                    ]);

                    Accommodation::factory(rand(0,2))->create([
                        'destination_id' => $destination->id
                    ]);

                });

                Transport::factory(rand(0,2))->create([
                    'trip_id' => $trip->id
                ]);

            });

        });
    }
}
