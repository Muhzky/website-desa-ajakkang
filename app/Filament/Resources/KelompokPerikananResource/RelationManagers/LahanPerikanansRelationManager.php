<?php

namespace App\Filament\Resources\KelompokPerikananResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class LahanPerikanansRelationManager extends RelationManager
{
    protected static string $relationship = 'lahanPerikanans';
    protected static ?string $title = 'Lahan Perikanan';

    public function form(Form $form): Form
    {
        return $form->schema([

            Forms\Components\TextInput::make('nama_lahan')
                ->label('Nama Lahan')
                ->required(),

            Forms\Components\Select::make('pemilik_id')
                ->label('Pemilik Lahan')
                ->relationship('pemilik', 'nama')
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
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('nama_lahan')
                    ->searchable(),

                Tables\Columns\TextColumn::make('pemilik.nama')
                    ->label('Pemilik'),

                Tables\Columns\TextColumn::make('jenis_lahan'),

                Tables\Columns\TextColumn::make('luas_lahan')
                    ->suffix(' m²'),

                Tables\Columns\IconColumn::make('status_aktif')
                    ->boolean(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Lahan'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}
