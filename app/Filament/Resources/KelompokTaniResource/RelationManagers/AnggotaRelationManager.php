<?php

namespace App\Filament\Resources\KelompokTaniResource\RelationManagers;
use App\Models\Penduduk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class AnggotaRelationManager extends RelationManager
{
    protected static string $relationship = 'anggota';

    protected static ?string $title = 'Anggota Kelompok Tani';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('penduduk_id')
                ->label('Nama Penduduk')
                ->options(
                    Penduduk::query()
                        ->orderBy('nama')
                        ->pluck('nama', 'id')
                )
                ->searchable()
                ->required(),

            Forms\Components\Select::make('jabatan')
                ->label('Jabatan')
                ->options([
                    'Ketua' => 'Ketua',
                    'Sekretaris' => 'Sekretaris',
                    'Anggota' => 'Anggota',
                ])
                ->default('Anggota')
                ->required(),
        ]);
    }

public function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('nama')
                ->label('Nama Penduduk'),

            Tables\Columns\TextColumn::make('pivot.jabatan')
                ->label('Jabatan'),
        ])
        ->headerActions([
            Tables\Actions\AttachAction::make()
                ->label('Tambah Anggota')
                ->color('success') // 
                ->recordTitleAttribute('nama')
                ->form([
                    Forms\Components\Select::make('recordId')
                        ->label('Nama Penduduk')
                        ->options(
                            \App\Models\Penduduk::orderBy('nama')->pluck('nama', 'id')
                        )
                        ->searchable()
                        ->required(),

                    Forms\Components\Select::make('jabatan')
                        ->label('Jabatan')
                        ->options([
                            'Sekretaris' => 'Sekretaris',
                            'Anggota' => 'Anggota',
                        ])
                        ->default('Anggota')
                        ->required(),
                ])
                // ⬇️ INI KUNCI SEBENARNYA (FILAMENT v3)
                ->using(function ($record, array $data, $livewire) {
                    /** @var \App\Models\KelompokTani $kelompok */
                    $kelompok = $livewire->ownerRecord;

                    $kelompok->anggota()->attach(
                        $record,
                        ['jabatan' => $data['jabatan']]
                    );
                }),
        ])
        ->actions([
            Tables\Actions\DetachAction::make()
            ->label('Hapus Anggota'),
        ]);
}

}