<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukUmkmResource\Pages;
use App\Models\ProdukUmkm;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;

class ProdukUmkmResource extends Resource
{
    protected static ?string $model = ProdukUmkm::class;
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationGroup = 'Potensi Desa';
    protected static ?string $navigationLabel = 'Produk UMKM';
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form->schema([

            Forms\Components\Select::make('umkm_id')
                ->label('Nama Toko / UMKM')
                ->relationship('umkm', 'nama_toko')
                ->searchable()
                ->preload()
                ->required(),

            Forms\Components\FileUpload::make('foto_produk')
                ->image()
                ->disk('public')
                ->directory('produk-umkm')
                ->imageEditor(),

            Forms\Components\TextInput::make('nama_produk')
                ->required(),

            Forms\Components\Select::make('kategori')
                ->options([
                    'Makanan' => 'Makanan',
                    'Minuman' => 'Minuman',
                    'Kerajinan' => 'Kerajinan',
                    'Fashion' => 'Fashion',
                ])
                ->required(),

            Forms\Components\TextInput::make('harga')
                ->numeric()
                ->prefix('Rp')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto_produk')
                    ->disk('public')
                    ->square(),

                Tables\Columns\TextColumn::make('nama_produk')
                    ->searchable(),

                Tables\Columns\TextColumn::make('umkm.nama_toko')
                    ->label('Toko')
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('kategori'),

                Tables\Columns\TextColumn::make('harga')
                    ->money('IDR', true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('umkm')
                    ->relationship('umkm', 'nama_toko'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProdukUmkms::route('/'),
            'create' => Pages\CreateProdukUmkm::route('/create'),
            'edit' => Pages\EditProdukUmkm::route('/{record}/edit'),
        ];
    }
}
