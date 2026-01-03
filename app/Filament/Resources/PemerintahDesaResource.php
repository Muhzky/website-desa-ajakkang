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
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;


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
                        'Kaur Umum Dan Tata Usaha' => 'Kaur Umum Dan Tata Usaha',
                        'Kaur Keuangan' => 'Kaur Keuangan',
                        'Kaur Perencanaan' => 'Kaur Perencanaan',
                        'Kasi Pelayanan' => 'Kasi Pelayanan',
                        'Kasi Kesejahteraan' => 'Kasi Kesejahteraan',
                        'Staf' => 'Staf',
                        'Kadus Ajakkang' => 'Kadus Ajakkang',
                        'Kadus Kampung Baru' => 'Kadus Kampung Baru',
                        'Kadus Latappareng' => 'Kadus Latappareng',
                        'Kadus Minangatoa' => 'Kadus Minangatoa',
                        'Petugas Kebersihan' => 'Petugas Kebersihan',
                    ])
                    ->native(false)
                    ->required(),

                FileUpload::make('foto')
                    ->label('Foto')
                    ->image()
                    ->disk('public')
                    ->directory('pemerintah-desa')
                    ->maxSize(2048) // 2MB
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
                    ->height(100)
                    ->square()
                    ->extraImgAttributes(['style' => 'border: 2.5px solid #ccc;']),

                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('jabatan')
                    ->searchable()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Lihat'),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->label('Hapus'),
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
