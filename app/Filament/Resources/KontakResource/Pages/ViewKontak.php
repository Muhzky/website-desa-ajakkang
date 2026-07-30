<?php

namespace App\Filament\Resources\KontakResource\Pages;

use App\Filament\Resources\KontakResource;
use Filament\Resources\Pages\ViewRecord;

class ViewKontak extends ViewRecord
{
    protected static string $resource = KontakResource::class;
    // ViewKontak.php
    // ViewKontak.php
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $this->record->update(['is_read' => true]);
        return $data;
    }
}
