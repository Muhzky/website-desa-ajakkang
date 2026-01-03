<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UmkmResource\Pages;
use App\Filament\Resources\UmkmResource\RelationManagers;
use App\Models\Umkm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UmkmResource extends Resource
{
    protected static ?string $model = Umkm::class;
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationGroup = 'Potensi Desa';
    protected static ?string $navigationLabel = 'UMKM (Daftar Toko)';
    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama_toko')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('pemilik')
                ->label('Nama Pemilik'),

            Forms\Components\Textarea::make('alamat')
                ->rows(3)
                ->required(),

            Forms\Components\TextInput::make('nomor_whatsapp')
                ->label('Nomor WhatsApp')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_toko')->searchable(),
                Tables\Columns\TextColumn::make('pemilik'),
                Tables\Columns\TextColumn::make('produks_count')
                    ->counts('produks')
                    ->label('Jumlah Produk'),
                Tables\Columns\TextColumn::make('created_at')->date('d M Y')
                ->label('Tanggal Dibuat')->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUmkms::route('/'),
            'create' => Pages\CreateUmkm::route('/create'),
            'edit' => Pages\EditUmkm::route('/{record}/edit'),
        ];
    }
}
