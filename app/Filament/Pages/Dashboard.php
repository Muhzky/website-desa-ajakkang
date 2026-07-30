<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected function getHeaderWidgets(): array
    {
        return [
            // KOSONGKAN → Welcome & Filament version HILANG
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [];
    }
}
