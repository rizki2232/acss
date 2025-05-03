<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarMovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = \App\Models\Car::all();

        foreach ($cars as $car) {
            // Tambahkan 1-3 histori pergerakan
            foreach (range(1, rand(1, 3)) as $i) {
                \App\Models\CarMovement::create([
                    'car_id' => $car->id,
                    'type' => fake()->randomElement(['in', 'out']),
                    'description' => fake()->optional()->sentence(),
                    'moved_at' => now()->subDays(rand(1, 500)),
                ]);
            }
        }
    }
}
