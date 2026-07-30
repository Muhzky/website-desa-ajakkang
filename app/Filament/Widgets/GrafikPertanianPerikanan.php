<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\LahanPertanian;
use App\Models\LahanPerikanan;

class GrafikPertanianPerikanan extends ChartWidget
{
    protected static ?string $heading = 'Pertanian & Perikanan';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Data',
                    'data' => [
                        LahanPertanian::count(),
                        LahanPerikanan::count(),
                    ],
                    'backgroundColor' => [
                        '#16A34A', // Pertanian
                        '#0EA5E9', // Perikanan
                    ],
                    'borderColor' => '#ffffff',
                    'borderWidth' => 2,
                ],
            ],
            'labels' => ['Pertanian', 'Perikanan'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
