<?php

namespace App\Filament\Resources\LahanPertanianResource\Pages;

use App\Filament\Resources\LahanPertanianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLahanPertanians extends ListRecords
{
    protected static string $resource = LahanPertanianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
