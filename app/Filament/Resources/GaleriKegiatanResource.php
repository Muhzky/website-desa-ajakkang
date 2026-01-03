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
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class GaleriKegiatanResource extends Resource
{
    protected static ?int $navigationSort = 7;
    protected static ?string $model = Galeri::class;

    protected static ?string $navigationLabel = 'Galeri Kegiatan';
    public static function getPluralModelLabel(): string
    {
        return 'Galeri Kegiatan';
    }
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
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->width(200)
                    ->height(150)
                    ->square()
                    ->extraImgAttributes(['style' => 'border: 2.5px solid #ccc; border-radius: 10px;']),

                TextColumn::make('nama')
                    ->label('Nama Kegiatan')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(60)
                    ->wrap()
                    ->toggleable(),

                TextColumn::make('tanggal_kegiatan')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->options([
                        'kegiatan' => 'Kegiatan Desa',
                    ])
                    ->default('kegiatan'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Lihat'),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->label('Hapus'),
            ])
            ->defaultSort('tanggal_kegiatan', 'desc');
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
