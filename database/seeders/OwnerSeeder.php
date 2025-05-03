<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 10) as $i) {
            \App\Models\Owner::create([
                'name' => fake()->name(),
                'phone' => fake()->phoneNumber(),
                'address' => fake()->address(),
            ]);
        }
    }
}
