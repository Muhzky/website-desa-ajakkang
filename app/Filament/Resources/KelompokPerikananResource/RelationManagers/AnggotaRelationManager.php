<?php

namespace App\Filament\Resources\KelompokPerikananResource\RelationManagers;

use App\Models\Penduduk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class AnggotaRelationManager extends RelationManager
{
    protected static string $relationship = 'anggota';
    protected static ?string $recordTitleAttribute = 'nama'; // ⬅️ WAJIB
    protected static ?string $title = 'Anggota Kelompok Perikanan';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('penduduk_id')
                ->label('Nama Penduduk')
                ->options(
                    Penduduk::query()->pluck('nama', 'id')
                )
                ->searchable()
                ->required(),

            Forms\Components\Select::make('jabatan')
                ->label('Jabatan')
                ->options([
                    'Anggota' => 'Anggota',
                    'Sekretaris' => 'Sekretaris',
                    'Bendahara' => 'Bendahara',
                ])
                ->default('Anggota')
                ->required(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                // ⬇️ HARUS pakai model Penduduk
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Penduduk'),

                Tables\Columns\TextColumn::make('pivot.jabatan')
                    ->label('Jabatan'),
            ])
            ->headerActions([
                // ⬅️ INI KUNCI AGAR DATA BISA MASUK
                Tables\Actions\AttachAction::make()
                    ->label('Tambah Anggota')
                    ->form([
                        Forms\Components\Select::make('recordId')
                            ->label('Nama Penduduk')
                            ->options(
                                Penduduk::query()->pluck('nama', 'id')
                            )
                            ->searchable()
                            ->required(),

                        Forms\Components\Select::make('jabatan')
                            ->options([
                                'Anggota' => 'Anggota',
                                'Sekretaris' => 'Sekretaris',
                                'Bendahara' => 'Bendahara',
                            ])
                            ->default('Anggota')
                            ->required(),
                    ]),
            ])
            ->actions([
                Tables\Actions\DetachAction::make(), // ⬅️ bukan Delete
            ]);
    }
}
