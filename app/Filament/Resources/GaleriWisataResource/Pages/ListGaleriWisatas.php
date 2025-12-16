<?php

namespace App\Filament\Resources\GaleriWisataResource\Pages;

use App\Filament\Resources\GaleriWisataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGaleriWisatas extends ListRecords
{
    protected static string $resource = GaleriWisataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
