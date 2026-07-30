<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Penduduk;

class GrafikPenduduk extends ChartWidget
{
    protected static ?string $heading = 'Grafik Penduduk';

    protected function getData(): array
{
    return [
        'datasets' => [
            [
                'label' => 'Jumlah Penduduk',
                'data' => [
                    Penduduk::where('jenis_kelamin', 'L')->count(),
                    Penduduk::where('jenis_kelamin', 'P')->count(),
                ],
                'backgroundColor' => [
                    '#0EA5E9', // Biru (Laki-laki)
                    '#16A34A', // Pink (Perempuan)
                ],
                'borderColor' => '#ffffff',
                'borderWidth' => 2,
            ],
        ],
        'labels' => ['Laki-laki', 'Perempuan'],
    ];
}


    protected function getType(): string
    {
        return 'pie'; // bisa: bar, doughnut
    }
}
