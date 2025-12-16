<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GaleriWisataResource\Pages;
use App\Filament\Resources\GaleriWisataResource\RelationManagers;
use App\Models\GaleriWisata;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Galeri;

class GaleriWisataResource extends Resource
{
    protected static ?string $model = Galeri::class;
    protected static ?int $navigationSort = 4;

    protected static ?string $navigationLabel = 'Galeri Wisata';
    protected static ?string $navigationGroup = 'Galeri Desa';
    protected static ?string $navigationIcon = 'heroicon-o-camera';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('kategori', 'pariwisata');
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Hidden::make('kategori')
                ->default('pariwisata'),

            Forms\Components\TextInput::make('nama')
                ->label('Nama Wisata')
                ->required(),

            Forms\Components\FileUpload::make('foto')
                ->image()
                ->directory('galeri/wisata')
                ->required(),

            Forms\Components\TextInput::make('alamat')
                ->label('Alamat / Maps URL'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto'),
                Tables\Columns\TextColumn::make('nama')->searchable(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGaleriWisatas::route('/'),
            'create' => Pages\CreateGaleriWisata::route('/create'),
            'edit' => Pages\EditGaleriWisata::route('/{record}/edit'),
        ];
    }
}
