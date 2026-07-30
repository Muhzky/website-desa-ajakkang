<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\RekapKeuangan as Anggaran;

class GrafikAnggaran extends ChartWidget
{
    protected static ?string $heading = 'Anggaran vs Realisasi';
    protected static ?int $sort = 1;
    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $anggaran = Anggaran::sum('pemasukan');
        $realisasi = Anggaran::sum('pengeluaran');

        return [
            'datasets' => [
                [
                    'label' => 'Rupiah',
                    'data' => [$anggaran, $realisasi],
                ],
            ],
            'labels' => ['Anggaran', 'Realisasi'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
