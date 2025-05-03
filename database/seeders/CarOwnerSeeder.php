<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarOwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = \App\Models\Car::where('is_new', false)->get();
        $owners = \App\Models\Owner::all();

        foreach ($cars as $car) {
            \App\Models\CarOwner::create([
                'car_id' => $car->id,
                'owner_id' => $owners->random()->id,
            ]);
        }
    }
}
