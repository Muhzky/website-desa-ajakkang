<?php

namespace App\Filament\Resources\PemerintahDesaResource\Pages;

use App\Filament\Resources\PemerintahDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPemerintahDesas extends ListRecords
{
    protected static string $resource = PemerintahDesaResource::class;

    protected function getHeaderActions(): array
    {
          return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-plus')
                ->label('Create'),
        ];
    }
}
