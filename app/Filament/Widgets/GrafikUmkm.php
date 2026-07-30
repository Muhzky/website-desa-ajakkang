<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\ProdukUmkm;

class GrafikUmkm extends ChartWidget
{
    protected static ?string $heading = 'UMKM per Kategori';

    protected function getData(): array
    {
        $data = ProdukUmkm::selectRaw('kategori, COUNT(*) as total')
            ->groupBy('kategori')
            ->pluck('total', 'kategori');

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Produk',
                    'data' => $data->values(),
                ],
            ],
            'labels' => $data->keys(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
