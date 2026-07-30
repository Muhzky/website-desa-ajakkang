<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KelompokPerikananResource\Pages;
use App\Filament\Resources\KelompokPerikananResource\RelationManagers\AnggotaRelationManager;
use App\Filament\Resources\KelompokPerikananResource\RelationManagers\LahanPerikanansRelationManager;
use App\Models\KelompokPerikanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KelompokPerikananResource extends Resource
{
    protected static ?string $model = KelompokPerikanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Potensi Desa';
    protected static ?string $navigationLabel = 'Kelompok Perikanan';
    protected static ?int $navigationSort = 10;

    /* ==========================
     |  FORM
     ========================== */

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Kelompok')
                ->schema([
                    Forms\Components\TextInput::make('nama_kelompok')
                        ->label('Nama Kelompok')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\Select::make('ketua_id')
                        ->label('Ketua Kelompok')
                        ->relationship('ketua', 'nama')
                        ->searchable()
                        ->preload()
                        ->required(),

                    Forms\Components\Textarea::make('keterangan')
                        ->label('Keterangan')
                        ->columnSpanFull(),
                ]),
        ]);
    }

    /* ==========================
     |  TABLE
     ========================== */

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_kelompok')
                    ->label('Nama Kelompok')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('ketua.nama')
                    ->label('Ketua')
                    ->searchable(),

                Tables\Columns\TextColumn::make('anggota_count')
                    ->counts('anggota')
                    ->label('Jumlah Anggota'),

                Tables\Columns\TextColumn::make('lahan_perikanans_count')
                    ->counts('lahanPerikanans')
                    ->label('Jumlah Lahan'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->date(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(), // ⬅️ WAJIB
                Tables\Actions\EditAction::make(),
            ])

            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    /* ==========================
     |  RELATION MANAGERS
     ========================== */

    public static function getRelations(): array
    {
        return [
            AnggotaRelationManager::class,
            LahanPerikanansRelationManager::class, // opsional tapi konsisten
        ];
    }

    /* ==========================
     |  PAGES
     ========================== */

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListKelompokPerikanans::route('/'),
            'create' => Pages\CreateKelompokPerikanan::route('/create'),
            'edit'   => Pages\EditKelompokPerikanan::route('/{record}/edit'),
            'view'   => Pages\ViewKelompokPerikanan::route('/{record}'),
        ];
    }
}
