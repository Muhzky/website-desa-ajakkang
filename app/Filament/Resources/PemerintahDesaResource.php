<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PemerintahDesaResource\Pages;
use App\Filament\Resources\PemerintahDesaResource\RelationManagers;
use App\Models\PemerintahDesa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PemerintahDesaResource extends Resource
{
    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Profil Desa';

    protected static ?string $model = PemerintahDesa::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function getNavigationLabel(): string
    {
        return 'Pemerintah Desa';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Pemerintah Desa';
    }
    public static function getModelLabel(): string
    {
        return 'Pemerintah Desa';
    }

    public static function getSlug(): string
    {
        return 'pemdes'; // url
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('jabatan')
                    ->options([
                        'Kepala Desa' => 'Kepala Desa',
                        'Sekretaris Desa' => 'Sekretaris Desa',
                        'Kaur Umum' => 'Kaur Umum',
                        'Kaur Keuangan' => 'Kaur Keuangan',
                        'Kasi Pemerintahan' => 'Kasi Pemerintahan',
                        'Kasi Pembangunan' => 'Kasi Pembangunan',
                    ])
                    ->native(false)
                    ->required(),

                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->disk('public')
                    ->maxSize(3048)
                    ->directory('pemerintah-desa')
                    ->rules(['image', 'max:2048'])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->circular()
                    ->size(40),

                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('jabatan')
                    ->searchable()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
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
            'index' => Pages\ListPemerintahDesas::route('/'),
            'create' => Pages\CreatePemerintahDesa::route('/create'),
            'edit' => Pages\EditPemerintahDesa::route('/{record}/edit'),
        ];
    }
}
