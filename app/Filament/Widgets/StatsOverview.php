<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\CarModel;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // Menghitung total mobil yang masuk (type 'in')
        $totalMobilMasuk = \App\Models\CarMovement::where('type', 'in')->sum('amount');
        $totalMobilKeluar = \App\Models\CarMovement::where('type', 'out')->sum('amount');

        $totalJenisMobil = \App\Models\Car::select('car_model_id', 'color', 'year')
            ->distinct()
            ->count();

        return [
            Stat::make(label: 'Mobil Masuk', value: $totalMobilMasuk)
                ->color('success')
                ->chart([7, 3, 4, 6, 4, 5, 3])  // Ini bisa diganti dengan data chart yang lebih relevan
                ->description('Total mobil yang masuk')
                ->descriptionIcon('heroicon-M-truck'),

            Stat::make(label: 'Mobil Keluar', value: $totalMobilKeluar)
                ->color('danger')
                ->chart([4, 6, 2, 5, 3, 2, 1])
                ->description('Total mobil yang keluar')
                ->descriptionIcon('heroicon-m-arrow-up-tray'),

            Stat::make('Jenis Mobil', $totalJenisMobil)
                ->color('primary')
                ->chart([1, 2, 2, 3, 3, 4, 5])
                ->description('Total jenis mobil tersedia')
                ->descriptionIcon('heroicon-m-rectangle-group'),
        ];
    }
}
