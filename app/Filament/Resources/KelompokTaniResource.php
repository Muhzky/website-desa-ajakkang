<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KelompokTaniResource\Pages;
use App\Filament\Resources\KelompokTaniResource\RelationManagers\AnggotaRelationManager;
use App\Filament\Resources\KelompokTaniResource\RelationManagers\LahanPertaniansRelationManager;
use App\Models\KelompokTani;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KelompokTaniResource extends Resource
{
    protected static ?string $model = KelompokTani::class;

    protected static ?string $navigationGroup = 'Potensi Desa';
    protected static ?string $navigationIcon  = 'heroicon-o-users';
    protected static ?int $navigationSort = 8;
    protected static ?string $navigationLabel = 'Kelompok Tani';
    protected static ?string $pluralModelLabel = 'Kelompok Tani';

    /**
     * ==========================
     * FORM
     * ==========================
     */
    public static function form(Form $form): Form
    {
        return $form->schema([

            Forms\Components\Section::make('Informasi Kelompok')
                ->schema([
                    Forms\Components\TextInput::make('nama_kelompok')
                        ->required()
                        ->maxLength(150),

                    Forms\Components\Select::make('ketua_id')
                        ->label('Ketua Kelompok')
                        ->relationship('ketua', 'nama')
                        ->searchable()
                        ->required(),

                    Forms\Components\Textarea::make('keterangan')
                        ->rows(3),
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
                Tables\Columns\TextColumn::make('nama_kelompok')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('ketua.nama')
                    ->label('Ketua'),

                Tables\Columns\TextColumn::make('anggota_count')
                    ->counts('anggota')
                    ->label('Jumlah Anggota'),

                Tables\Columns\TextColumn::make('lahan_pertanians_count')
                    ->counts('lahanPertanians')
                    ->label('Jumlah Lahan'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->date(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->defaultSort('nama_kelompok');
    }

    /**
     * ==========================
     * RELATIONS
     * ==========================
     */
    public static function getRelations(): array
    {
        return [
            AnggotaRelationManager::class,
            LahanPertaniansRelationManager::class,
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
            'index'  => Pages\ListKelompokTanis::route('/'),
            'create' => Pages\CreateKelompokTani::route('/create'),
            'edit'   => Pages\EditKelompokTani::route('/{record}/edit'),
            'view'   => Pages\ViewKelompokTani::route('/{record}'),
        ];
    }
}
