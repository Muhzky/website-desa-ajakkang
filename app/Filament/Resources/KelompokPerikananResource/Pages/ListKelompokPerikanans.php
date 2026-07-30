<?php

namespace App\Filament\Resources\KelompokPerikananResource\Pages;

use App\Filament\Resources\KelompokPerikananResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKelompokPerikanans extends ListRecords
{
    protected static string $resource = KelompokPerikananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
