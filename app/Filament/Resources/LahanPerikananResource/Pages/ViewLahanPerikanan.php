<?php

namespace App\Filament\Resources\LahanPerikananResource\Pages;

use App\Filament\Resources\LahanPerikananResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Infolists\Infolist;

class ViewLahanPerikanan extends ViewRecord
{
    protected static string $resource = LahanPerikananResource::class;

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

            /* =======================
             * INFORMASI LAHAN
             * ======================= */
            Infolists\Components\Section::make('Informasi Lahan Perikanan')
                ->schema([
                    Infolists\Components\TextEntry::make('nama_lahan')
                        ->label('Nama Lahan'),

                    Infolists\Components\TextEntry::make('pemilik.nama')
                        ->label('Pemilik Lahan'),

                    Infolists\Components\TextEntry::make('kelompokPerikanan.nama_kelompok')
                        ->label('Kelompok Perikanan'),

                    Infolists\Components\TextEntry::make('jenis_lahan')
                        ->label('Jenis Lahan'),

                    Infolists\Components\TextEntry::make('luas_lahan')
                        ->label('Luas Lahan')
                        ->suffix(' m²'),

                    Infolists\Components\TextEntry::make('sumber_air')
                        ->label('Sumber Air'),

                    Infolists\Components\TextEntry::make('lokasi')
                        ->label('Lokasi')
                        ->placeholder('-'),
                ])
                ->columns(2),

            /* =======================
             * STATUS
             * ======================= */
            Infolists\Components\Section::make('Status')
                ->schema([
                    Infolists\Components\IconEntry::make('status_aktif')
                        ->label('Status Aktif')
                        ->boolean(),
                ])
                ->columns(2),

            /* =======================
             * KOMODITAS IKAN
             * ======================= */
            Infolists\Components\Section::make('Komoditas Detail')
                ->schema([
                    Infolists\Components\RepeatableEntry::make('komoditas')
                        ->schema([
                            Infolists\Components\TextEntry::make('nama_komoditas')
                                ->label('Jenis Ikan'),

                            Infolists\Components\TextEntry::make('musim_tebar')
                                ->label('Musim Tebar'),

                            Infolists\Components\TextEntry::make('estimasi_panen_hari')
                                ->label('Estimasi Panen')
                                ->suffix(' hari'),

                            Infolists\Components\TextEntry::make('rata_rata_hasil')
                                ->label('Rata-rata Hasil'),
                        ])
                        ->columns(2),
                ])
                ->collapsed(),
        ]);
    }
}
