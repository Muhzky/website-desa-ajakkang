<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataPendudukResource\Pages;
use App\Filament\Resources\DataPendudukResource\RelationManagers;
use App\Models\DataPenduduk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataPendudukResource extends Resource
{
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Profil Desa';

    protected static ?string $model = DataPenduduk::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        return 'Data Penduduk';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Data Penduduk';
    }

    public static function getSlug(): string
    {
        return 'data-penduduk'; // url
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tahun')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('total_penduduk')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('laki_laki')
                    ->label('Laki-laki')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('perempuan')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('kepala_keluarga')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('mobilitas_permanen')
                    ->label('Mobilitas Permanen')
                    ->numeric()
                    ->nullable(),

                Forms\Components\TextInput::make('mutasi_penduduk')
                    ->label('Mutasi Penduduk')
                    ->numeric()
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tahun')->sortable(),

                Tables\Columns\TextColumn::make('total_penduduk')
                    ->label('Total')
                    ->sortable(),

                Tables\Columns\TextColumn::make('laki_laki')
                    ->label('Laki-laki'),

                Tables\Columns\TextColumn::make('perempuan'),

                Tables\Columns\TextColumn::make('kepala_keluarga'),

                Tables\Columns\TextColumn::make('mobilitas_permanen')
                    ->label('Mobilitas Permanen'),

                Tables\Columns\TextColumn::make('mutasi_penduduk')
                    ->label('Mutasi Penduduk'),
            ])
            ->defaultSort('tahun', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDataPenduduks::route('/'),
            'create' => Pages\CreateDataPenduduk::route('/create'),
            'edit' => Pages\EditDataPenduduk::route('/{record}/edit'),
        ];
    }
}
