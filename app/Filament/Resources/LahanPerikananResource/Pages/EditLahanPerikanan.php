<?php

namespace App\Filament\Resources\LahanPerikananResource\Pages;

use App\Filament\Resources\LahanPerikananResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLahanPerikanan extends EditRecord
{
    protected static string $resource = LahanPerikananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
