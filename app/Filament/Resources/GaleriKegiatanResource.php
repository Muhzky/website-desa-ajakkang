<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GaleriKegiatanResource\Pages;
use App\Filament\Resources\GaleriKegiatanResource\RelationManagers;
use App\Models\GaleriKegiatan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Galeri;

class GaleriKegiatanResource extends Resource
{
    protected static ?int $navigationSort = 5;
     protected static ?string $model = Galeri::class;

    protected static ?string $navigationLabel = 'Galeri Kegiatan';
    protected static ?string $navigationGroup = 'Galeri Desa';
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('kategori', 'kegiatan');
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Hidden::make('kategori')
                ->default('kegiatan'),

            Forms\Components\TextInput::make('nama')
                ->label('Nama Kegiatan')
                ->required(),

            Forms\Components\FileUpload::make('foto')
                ->image()
                ->directory('galeri/kegiatan')
                ->required(),

            Forms\Components\Textarea::make('deskripsi')
                ->label('Deskripsi'),

            Forms\Components\DatePicker::make('tanggal_kegiatan')
                ->label('Tanggal Kegiatan')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto'),
                Tables\Columns\TextColumn::make('nama')->searchable(),
               Tables\Columns\TextColumn::make('tanggal_kegiatan')
    ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->format('d M Y')),

            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGaleriKegiatans::route('/'),
            'create' => Pages\CreateGaleriKegiatan::route('/create'),
            'edit' => Pages\EditGaleriKegiatan::route('/{record}/edit'),
        ];
    }
}
