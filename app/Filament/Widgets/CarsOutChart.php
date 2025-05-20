<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\CarMovement;
use Illuminate\Support\Facades\DB;

class CarsOutChart extends ChartWidget
{
    protected static ?string $heading = 'Mobil Keluar per Bulan';

    protected function getData(): array
    {
        $year = now()->year;

        $outData = CarMovement::selectRaw('MONTH(moved_at) as month, SUM(amount) as total')
            ->where('type', 'out')
            ->whereYear('moved_at', now()->year)
            ->groupBy(DB::raw('MONTH(moved_at)'))
            ->pluck('total', 'month');


        $outCounts = [];
        for ($i = 1; $i <= 12; $i++) {
            $outCounts[] = $outData->get($i, 0);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Mobil Keluar',
                    'data' => $outCounts,
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                ],
            ],
            'labels' => [
                'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember',
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
