<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carModels = \App\Models\CarModel::all();

        foreach (range(1, 20) as $i) {
            $carModel = $carModels->random();

            \App\Models\Car::create([
                'car_model_id' => $carModel->id,
                'color' => fake()->safeColorName(),
                'year' => fake()->numberBetween(2018, 2024),
                'license_plate' => strtoupper('B ' . fake()->numberBetween(1000,9999) . ' ' . fake()->randomLetter() . fake()->randomLetter()),
            ]);
        }
    }
}
