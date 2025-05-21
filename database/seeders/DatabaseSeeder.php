<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            BrandCarModelSeeder::class,
            CarSeeder::class,
            // OwnerSeeder::class,
            // CarOwnerSeeder::class,
            // CarMovementSeeder::class,
        ]);
    }
}
