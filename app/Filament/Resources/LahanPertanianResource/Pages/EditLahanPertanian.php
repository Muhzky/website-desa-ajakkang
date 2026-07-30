<?php

namespace App\Filament\Resources\LahanPertanianResource\Pages;

use App\Filament\Resources\LahanPertanianResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLahanPertanian extends EditRecord
{
    protected static string $resource = LahanPertanianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
