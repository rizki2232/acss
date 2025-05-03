<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandCarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'Toyota' => ['Avanza', 'Innova', 'Fortuner'],
            'Honda' => ['Civic', 'Jazz', 'HR-V'],
            'Mitsubishi' => ['Xpander', 'Pajero Sport'],
            'Suzuki' => ['Ertiga', 'Carry'],
        ];

        foreach ($brands as $brandName => $models) {
            $brand = \App\Models\Brand::create(['name' => $brandName]);

            foreach ($models as $model) {
                \App\Models\CarModel::create([
                    'brand_id' => $brand->id,
                    'name' => $model,
                ]);
            }
        }
    }
}
