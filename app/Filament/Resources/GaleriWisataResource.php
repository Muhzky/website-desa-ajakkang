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
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class GaleriWisataResource extends Resource
{
    protected static ?string $model = Galeri::class;
    protected static ?int $navigationSort = 6;

    protected static ?string $navigationLabel = 'Galeri Wisata';
    public static function getPluralModelLabel(): string
    {
        return 'Galeri Wisata';
    }
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
                ->required()
                ->maxLength(255),

            Forms\Components\FileUpload::make('foto')
                ->label('Foto Wisata')
                ->image()
                ->disk('public')
                ->directory('galeri/wisata')
                ->imageEditor()
                ->maxSize(5120)
                ->required(),

            Forms\Components\Textarea::make('alamat_wisata')
                ->label('Alamat Wisata')
                ->rows(1)
                ->placeholder('Dusun / Desa / Kecamatan / Kabupaten')
                ->required(),

            Forms\Components\TextInput::make('maps_url')
                ->label('Link Google Maps')
                ->url()
                ->placeholder('https://maps.google.com/...')
                ->helperText('Tempel link lokasi dari Google Maps')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->width(200)
                    ->height(150)
                    ->square()
                    ->extraImgAttributes(['style' => 'border: 2.5px solid #ccc; border-radius: 10px;']),

                IconColumn::make('maps_url')
                    ->label('Maps')
                    ->icon('heroicon-o-map-pin')
                    ->url(fn($record) => $record->maps_url)
                    ->openUrlInNewTab()
                    ->color('success'),


                TextColumn::make('nama')
                    ->label('Nama Wisata')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('alamat_wisata')
                    ->label('Alamat Wisata')
                    ->limit(50)
                    ->wrap(),

                TextColumn::make('maps_url')
                    ->label('Google Maps')
                    ->url(fn($record) => $record->maps_url)
                    ->openUrlInNewTab()
                    ->formatStateUsing(fn() => 'Lihat Lokasi')
                    ->color('primary'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->options([
                        'pariwisata' => 'Pariwisata',
                    ])
                    ->default('pariwisata'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Lihat'),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->label('Hapus'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
