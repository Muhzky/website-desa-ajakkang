<?php

namespace App\Filament\Resources\LahanPertanianResource\Pages;

use App\Filament\Resources\LahanPertanianResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Infolists\Infolist;

class ViewLahanPertanian extends ViewRecord
{
    protected static string $resource = LahanPertanianResource::class;

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

            Infolists\Components\Section::make('Informasi Lahan Pertanian')
                ->schema([
                    Infolists\Components\TextEntry::make('nama_lahan')
                        ->label('Nama Lahan'),

                    Infolists\Components\TextEntry::make('pemilik.nama')
                        ->label('Pemilik Lahan'),

                    Infolists\Components\TextEntry::make('kelompokTani.nama_kelompok')
                        ->label('Kelompok Tani'),

                    Infolists\Components\TextEntry::make('jenis_lahan')
                        ->label('Jenis Lahan'),

                    Infolists\Components\TextEntry::make('luas_lahan')
                        ->label('Luas Lahan')
                        ->suffix(' Ha'),

                    Infolists\Components\TextEntry::make('status_kepemilikan')
                        ->label('Status Kepemilikan'),

                    Infolists\Components\TextEntry::make('lokasi')
                        ->label('Lokasi')
                        ->placeholder('-'),
                ])
                ->columns(2),

            Infolists\Components\Section::make('Status')
                ->schema([
                    Infolists\Components\IconEntry::make('status_aktif')
                        ->label('Status Aktif')
                        ->boolean(),

                    Infolists\Components\IconEntry::make('is_published')
                        ->label('Ditampilkan di Website')
                        ->boolean(),
                ])
                ->columns(2),

            Infolists\Components\Section::make('Komoditas Detail')
                ->schema([
                    Infolists\Components\RepeatableEntry::make('komoditas')
                        ->schema([
                            Infolists\Components\TextEntry::make('nama_komoditas')
                                ->label('Komoditas'),

                            Infolists\Components\TextEntry::make('musim_tanam')
                                ->label('Musim Tanam'),

                            Infolists\Components\TextEntry::make('musim_tanam')
                                ->label('Musim Panen'),

                            Infolists\Components\TextEntry::make('estimasi_panen_hari')
                                ->label('Estimasi Panen')
                                ->suffix(' Hari'),

                            Infolists\Components\TextEntry::make('rata_hasil_panen')
                                ->label('Rata-rata Hasil Panen')
                                ->suffix(' Kg'),
                        ])
                        ->columns(3),
                ])
                ->collapsed(),
        ]);
    }
}
