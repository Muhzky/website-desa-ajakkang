<?php

namespace App\Filament\Resources\PemerintahDesaResource\Pages;

use App\Filament\Resources\PemerintahDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPemerintahDesa extends EditRecord
{
    protected static string $resource = PemerintahDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

     protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // Redirect ke halaman List
    }
}
