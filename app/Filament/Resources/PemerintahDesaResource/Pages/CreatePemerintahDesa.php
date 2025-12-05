<?php

namespace App\Filament\Resources\PemerintahDesaResource\Pages;

use App\Filament\Resources\PemerintahDesaResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Actions;

class CreatePemerintahDesa extends CreateRecord
{
    protected static string $resource = PemerintahDesaResource::class;

    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // Redirect ke halaman List
    }
}
