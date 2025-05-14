<?php

namespace App\Filament\Resources\CarMovementResource\Pages;

use App\Filament\Resources\CarMovementResource;
use App\Models\Car;
use App\Models\CarMovement;
use Filament\Resources\Pages\CreateRecord;

class CreateCarMovement extends CreateRecord
{
    protected static string $resource = CarMovementResource::class;

    protected function handleRecordCreation(array $data): CarMovement
    {
        $lastMovement = null;

        foreach ($data['carMovement'] as $movement) {
            $lastMovement = CarMovement::create([
                'car_id'     => $movement['car_id'],
                'type'       => $movement['type'],
                'amount'     => $movement['amount'],
                'description' => $movement['description'] ?? null,
                'moved_at'   => $movement['moved_at'],
            ]);
        }

        // Return satu record valid (misalnya yang terakhir dibuat)
        return $lastMovement;
    }
}
