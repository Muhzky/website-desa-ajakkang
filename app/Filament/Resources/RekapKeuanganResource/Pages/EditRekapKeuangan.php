<?php

namespace App\Filament\Resources\RekapKeuanganResource\Pages;

use App\Filament\Resources\RekapKeuanganResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRekapKeuangan extends EditRecord
{
    protected static string $resource = RekapKeuanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
