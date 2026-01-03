<?php

namespace App\Filament\Resources\TransparansiAnggaranResource\Pages;

use App\Filament\Resources\TransparansiAnggaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransparansiAnggarans extends ListRecords
{
    protected static string $resource = TransparansiAnggaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
