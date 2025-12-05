<?php

namespace App\Filament\Resources\DataPendudukResource\Pages;

use App\Filament\Resources\DataPendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDataPenduduk extends CreateRecord
{
    protected static string $resource = DataPendudukResource::class;
    protected static bool $canCreateAnother = false;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // Redirect ke halaman List
    }
}
