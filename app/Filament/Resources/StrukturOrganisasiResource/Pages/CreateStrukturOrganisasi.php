<?php

namespace App\Filament\Resources\StrukturOrganisasiResource\Pages;

use App\Filament\Resources\StrukturOrganisasiResource;
use App\Models\StrukturOrganisasi;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\ValidationException;

class CreateStrukturOrganisasi extends CreateRecord
{
    protected static string $resource = StrukturOrganisasiResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Cegah slug duplikat (hard validation)
        if (StrukturOrganisasi::where('slug', $data['slug'])->exists()) {
            throw ValidationException::withMessages([
                'slug' => 'Struktur organisasi ini sudah ada.',
            ]);
        }

        return $data;
    }
}
