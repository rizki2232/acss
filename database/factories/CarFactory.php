<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $carModel = \App\Models\CarModel::inRandomOrder()->first();

        return [
            'car_model_id' => $carModel->id,
            'color' => $this->faker->safeColorName(),
            'year' => $this->faker->year(),
            'license_plate' => strtoupper($this->faker->bothify('B #### ??')),
        ];
    }
}
