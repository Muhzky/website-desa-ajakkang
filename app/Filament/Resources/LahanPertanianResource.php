<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LahanPertanianResource\Pages;
use App\Filament\Resources\LahanPertanianResource\RelationManagers\KomoditasRelationManager;
use App\Models\LahanPertanian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LahanPertanianResource extends Resource
{
    protected static ?string $model = LahanPertanian::class;

    protected static ?string $navigationGroup = 'Potensi Desa';
    protected static ?string $navigationIcon  = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 9;
    protected static ?string $navigationLabel = 'Lahan Pertanian';
    protected static ?string $pluralModelLabel = 'Lahan Pertanian';

    /**
     * ==========================
     * FORM
     * ==========================
     */
    public static function form(Form $form): Form
    {
        return $form->schema([

            Forms\Components\Section::make('Data Utama')
                ->schema([
                    Forms\Components\TextInput::make('nama_lahan')
                        ->required()
                        ->maxLength(150),

                    Forms\Components\Select::make('pemilik_id')
                        ->label('Pemilik Lahan')
                        ->relationship('pemilik', 'nama')
                        ->searchable()
                        ->required(),

                    Forms\Components\Select::make('kelompok_tani_id')
                        ->label('Kelompok Tani')
                        ->relationship('kelompokTani', 'nama_kelompok')
                        ->searchable()
                        ->required(),
                ])
                ->columns(2),

            Forms\Components\Section::make('Detail Lahan')
                ->schema([
                    Forms\Components\Select::make('jenis_lahan')
                        ->options([
                            'Sawah Irigasi'      => 'Sawah Irigasi',
                            'Sawah Tadah Hujan'  => 'Sawah Tadah Hujan',
                            'Ladang'             => 'Ladang',
                            'Kebun'              => 'Kebun',
                        ])
                        ->native(false)
                        ->required(),

                    Forms\Components\TextInput::make('luas_lahan')
                        ->numeric()
                        ->suffix('Ha')
                        ->required(),

                    Forms\Components\Select::make('status_kepemilikan')
                        ->options([
                            'Milik Warga' => 'Milik Warga',
                            'Tanah Desa'  => 'Tanah Desa',
                            'Sewa'        => 'Sewa',
                        ])
                        ->native(false)
                        ->required(),

                    Forms\Components\TextInput::make('lokasi'),
                ])
                ->columns(2),

            Forms\Components\Section::make('Status')
                ->schema([
                    Forms\Components\Toggle::make('status_aktif')
                        ->default(true),

                    Forms\Components\Toggle::make('is_published')
                        ->default(true),
                ])
                ->columns(2),
        ]);
    }

    /**
     * ==========================
     * TABLE
     * ==========================
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_lahan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('pemilik.nama')
                    ->label('Pemilik')
                    ->sortable(),

                Tables\Columns\TextColumn::make('kelompokTani.nama_kelompok')
                    ->label('Kelompok Tani'),

                Tables\Columns\TextColumn::make('jenis_lahan'),
                Tables\Columns\TextColumn::make('luas_lahan')->suffix(' Ha'),

                Tables\Columns\IconColumn::make('status_aktif')
                    ->boolean(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->defaultSort('nama_lahan');
    }

    /**
     * ==========================
     * RELATIONS
     * ==========================
     */
    public static function getRelations(): array
    {
        return [
            KomoditasRelationManager::class,
        ];
    }

    /**
     * ==========================
     * PAGES
     * ==========================
     */
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListLahanPertanians::route('/'),
            'create' => Pages\CreateLahanPertanian::route('/create'),
            'edit'   => Pages\EditLahanPertanian::route('/{record}/edit'),
            'view'   => Pages\ViewLahanPertanian::route('/{record}'),
        ];
    }
}
