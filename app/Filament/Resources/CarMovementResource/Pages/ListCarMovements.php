<?php

namespace App\Filament\Resources\CarMovementResource\Pages;

use App\Filament\Resources\CarMovementResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListCarMovements extends ListRecords
{
    protected static string $resource = CarMovementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'in' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('type', 'in')),
            'out' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('type', 'out')),
        ];
    }

    public function getDefaultActiveTab(): string | int | null
    {
        return 'in';
    }
}
