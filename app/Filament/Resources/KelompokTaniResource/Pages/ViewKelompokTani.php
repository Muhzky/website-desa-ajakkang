<?php

namespace App\Filament\Resources\KelompokTaniResource\Pages;

use App\Filament\Resources\KelompokTaniResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Infolists\Infolist;

class ViewKelompokTani extends ViewRecord
{
    protected static string $resource = KelompokTaniResource::class;

    /**
     * ==========================
     * HEADER ACTIONS
     * ==========================
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    /**
     * ==========================
     * INFO LIST
     * ==========================
     */
    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([

            Infolists\Components\Section::make('Informasi Kelompok Tani')
                ->schema([
                    Infolists\Components\TextEntry::make('nama_kelompok')
                        ->label('Nama Kelompok'),

                    Infolists\Components\TextEntry::make('ketua.nama')
                        ->label('Ketua Kelompok'),

                    Infolists\Components\TextEntry::make('anggota_count')
                        ->label('Jumlah Anggota')
                        ->state(fn ($record) => $record->anggota()->count()),

                    Infolists\Components\TextEntry::make('keterangan')
                        ->label('Keterangan')
                        ->placeholder('-'),
                ])
                ->columns(2),

            Infolists\Components\Section::make('Anggota Kelompok')
                ->schema([
                    Infolists\Components\RepeatableEntry::make('anggota')
                        ->schema([
                            Infolists\Components\TextEntry::make('nama')
                                ->label('Nama'),

                            Infolists\Components\TextEntry::make('pivot.jabatan')
                                ->label('Jabatan'),
                        ])
                        ->columns(2),
                ])
                ->collapsed(),
        ]);
    }
}
