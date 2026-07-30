<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LahanPerikananResource\RelationManagers;
use App\Filament\Resources\LahanPerikananResource\Pages;
use App\Models\LahanPerikanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LahanPerikananResource extends Resource
{
    protected static ?string $model = LahanPerikanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 11;

    protected static ?string $navigationGroup = 'Potensi Desa';
    protected static ?string $navigationLabel = 'Lahan Perikanan';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Lahan')
                ->schema([
                    Forms\Components\TextInput::make('nama_lahan')
                        ->required(),

                    Forms\Components\Select::make('pemilik_id')
                        ->label('Pemilik')
                        ->relationship('pemilik', 'nama')
                        ->searchable()
                        ->required(),

                    Forms\Components\Select::make('kelompok_perikanan_id')
                        ->label('Kelompok Perikanan')
                        ->relationship('kelompokPerikanan', 'nama_kelompok')
                        ->searchable()
                        ->required(),

                    Forms\Components\Select::make('jenis_lahan')
                        ->options([
                            'Kolam Tanah' => 'Kolam Tanah',
                            'Kolam Terpal' => 'Kolam Terpal',
                            'Kolam Beton' => 'Kolam Beton',
                            'Tambak' => 'Tambak',
                        ])
                        ->required(),

                    Forms\Components\TextInput::make('luas_lahan')
                        ->numeric()
                        ->suffix('m²')
                        ->required(),

                    Forms\Components\TextInput::make('sumber_air')
                        ->required(),

                    Forms\Components\TextInput::make('lokasi'),

                    Forms\Components\Toggle::make('status_aktif')
                        ->default(true),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_lahan')->searchable(),
                Tables\Columns\TextColumn::make('pemilik.nama')->label('Pemilik'),
                Tables\Columns\TextColumn::make('jenis_lahan'),
                Tables\Columns\TextColumn::make('luas_lahan')->suffix(' m²'),
                Tables\Columns\IconColumn::make('status_aktif')->boolean(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\KomoditasRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLahanPerikanans::route('/'),
            'create' => Pages\CreateLahanPerikanan::route('/create'),
            'view' => Pages\ViewLahanPerikanan::route('/{record}'),
            'edit' => Pages\EditLahanPerikanan::route('/{record}/edit'),
        ];
    }
}
