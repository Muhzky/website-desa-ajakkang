<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KeluargaResource\Pages;
use App\Filament\Resources\KeluargaResource\RelationManagers\PenduduksRelationManager;
use App\Models\Keluarga;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KeluargaResource extends Resource
{
    protected static ?string $model = Keluarga::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationLabel = 'Keluarga (KK)';
    protected static ?string $pluralModelLabel = 'Data Keluarga';
    

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Data Kartu Keluarga')
                ->schema([
                    
                    Forms\Components\TextInput::make('no_kk')
                        ->label('Nomor KK')
                        ->required()
                        ->numeric()
                        ->unique(ignoreRecord: true)
                        ->maxLength(16),

                    Forms\Components\Textarea::make('alamat')
                        ->required()
                        ->rows(3),

                    Forms\Components\TextInput::make('rt')
                        ->label('RT')
                        ->required()
                        ->maxLength(3),

                    Forms\Components\TextInput::make('rw')
                        ->label('RW')
                        ->required()
                        ->maxLength(3),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no_kk')->searchable(),
                Tables\Columns\TextColumn::make('alamat')->limit(30),
                Tables\Columns\TextColumn::make('rt'),
                Tables\Columns\TextColumn::make('rw'),
                Tables\Columns\TextColumn::make('penduduks_count')
                    ->counts('penduduks')
                    ->label('Jumlah Anggota'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            PenduduksRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKeluargas::route('/'),
            'create' => Pages\CreateKeluarga::route('/create'),
            'edit' => Pages\EditKeluarga::route('/{record}/edit'),
        ];
    }
}
