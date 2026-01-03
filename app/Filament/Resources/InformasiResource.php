<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InformasiResource\Pages;
use App\Models\Informasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class InformasiResource extends Resource
{
    protected static ?int $navigationSort = 8;
    protected static ?string $model = Informasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $navigationGroup = 'Informasi Desa';
    public static function getPluralModelLabel(): string
    {
        return 'Informasi';
    }

    protected static ?string $navigationLabel = 'Informasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),

                Forms\Components\DatePicker::make('tanggal')
                    ->label('Tanggal')
                    ->required(),

                Forms\Components\FileUpload::make('foto')
                    ->label('Foto')
                    ->image()
                    ->disk('public')
                    ->directory('informasi')
                    ->visibility('public')
                    ->preserveFilenames()
                    ->maxSize(5120)
                    ->required(),

                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->rows(3)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->width(200)
                    ->height(150)
                    ->square()
                    ->extraImgAttributes(['style' => 'border: 2.5px solid #ccc; border-radius: 10px;']),

                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(40)
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->wrap(),

                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->defaultSort('tanggal', 'desc')

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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInformasis::route('/'),
            'create' => Pages\CreateInformasi::route('/create'),
            'edit' => Pages\EditInformasi::route('/{record}/edit'),
        ];
    }
}
