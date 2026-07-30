<?php

namespace App\Filament\Resources\LahanPerikananResource\Pages;

use App\Filament\Resources\LahanPerikananResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLahanPerikanans extends ListRecords
{
    protected static string $resource = LahanPerikananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
