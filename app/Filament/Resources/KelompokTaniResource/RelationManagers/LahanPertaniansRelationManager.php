<?php

namespace App\Filament\Resources\KelompokTaniResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\RelationManagers\RelationManager;

class LahanPertaniansRelationManager extends RelationManager
{
    protected static string $relationship = 'lahanPertanians';

    protected static ?string $title = 'Lahan Pertanian';

    /**
     * ==========================
     * FORM
     * ==========================
     */
    public function form(Form $form): Form
    {
        return $form->schema([

            Forms\Components\TextInput::make('nama_lahan')
                ->required(),

            Forms\Components\Select::make('pemilik_id')
                ->label('Pemilik Lahan')
                ->relationship('pemilik', 'nama')
                ->options(
                            \App\Models\Penduduk::orderBy('nama')->pluck('nama', 'id')
                        )
                ->searchable()
                ->required(),

            Forms\Components\Select::make('jenis_lahan')
                ->options([
                    'Sawah Irigasi'     => 'Sawah Irigasi',
                    'Sawah Tadah Hujan' => 'Sawah Tadah Hujan',
                    'Ladang'            => 'Ladang',
                    'Kebun'             => 'Kebun',
                ])
                ->required(),

            Forms\Components\TextInput::make('luas_lahan')
                ->numeric()
                ->suffix('Ha')
                ->required(),

            Forms\Components\Toggle::make('status_aktif')
                ->default(true),
        ]);
    }

    /**
     * ==========================
     * TABLE
     * ==========================
     */
    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_lahan')
                    ->label('Nama Lahan')
                    ->searchable(),

                Tables\Columns\TextColumn::make('pemilik.nama')
                    ->label('Pemilik'),

                Tables\Columns\TextColumn::make('jenis_lahan')
                    ->label('Jenis'),

                Tables\Columns\TextColumn::make('luas_lahan')
                    ->label('Luas')
                    ->suffix(' Ha'),

                Tables\Columns\IconColumn::make('status_aktif')
                    ->boolean(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Lahan'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}
