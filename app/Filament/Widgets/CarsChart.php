<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Arr;
use App\Models\CarMovement;
use App\Models\Car;

class CarsChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'Blog posts created',
                    'data' => [0, 4, 5, 6, 7, 3, 4, 5, 3, 3],
                ]
            ],
            'labels' => [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

}
