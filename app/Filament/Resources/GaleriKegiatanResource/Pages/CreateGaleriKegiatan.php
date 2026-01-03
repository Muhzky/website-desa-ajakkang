<?php

namespace App\Filament\Resources\GaleriKegiatanResource\Pages;

use App\Filament\Resources\GaleriKegiatanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGaleriKegiatan extends CreateRecord
{
    protected static string $resource = GaleriKegiatanResource::class;
    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // Redirect ke halaman List
    }
}
