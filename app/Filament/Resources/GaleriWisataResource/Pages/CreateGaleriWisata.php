<?php

namespace App\Filament\Resources\GaleriWisataResource\Pages;

use App\Filament\Resources\GaleriWisataResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGaleriWisata extends CreateRecord
{
    protected static string $resource = GaleriWisataResource::class;

    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // Redirect ke halaman List
    }
}
