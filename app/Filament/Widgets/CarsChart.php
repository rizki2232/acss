<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\CarMovement;
use Illuminate\Support\Facades\DB;

class CarsChart extends ChartWidget
{
    protected static ?string $heading = 'Mobil Masuk per Bulan';

    protected function getData(): array
    {
        // Ambil jumlah mobil masuk per bulan dari kolom moved_at
        $data = CarMovement::selectRaw('MONTH(moved_at) as month, SUM(amount) as total')
            ->where('type', 'in')
            ->whereYear('moved_at', now()->year)
            ->groupBy(DB::raw('MONTH(moved_at)'))
            ->pluck('total', 'month');


        // Buat array jumlah untuk semua bulan (1-12)
        $monthlyCounts = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyCounts[] = $data->get($i, 0); // default ke 0 jika tidak ada data
        }

        return [
            'datasets' => [
                [
                    'label' => 'Mobil Masuk',
                    'data' => $monthlyCounts,
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
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
