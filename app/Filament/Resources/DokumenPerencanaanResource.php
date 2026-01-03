<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DokumenPerencanaanResource\Pages;
use App\Filament\Resources\DokumenPerencanaanResource\RelationManagers;
use App\Models\DokumenPerencanaan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;

class DokumenPerencanaanResource extends Resource
{
    protected static ?int $navigationSort = 12;
    protected static ?string $model = DokumenPerencanaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Transparansi';
    public static function getPluralModelLabel(): string
    {
        return 'Dokumen Perencanaan';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_dokumen')
                    ->label('Nama Dokumen')
                    ->required()
                    ->maxLength(255),

                Select::make('tipe')
                    ->label('Tipe Dokumen')
                    ->options([
                        'UMUM' => 'UMUM',
                    ])
                    ->default('UMUM')
                    ->required(),

                DatePicker::make('tanggal')
                    ->label('Tanggal')
                    ->required(),

                FileUpload::make('file')
                    ->label('Berkas Dokumen')
                    ->disk('public')
                    ->directory('dokumen-perencanaan')
                    ->preserveFilenames()
                    ->acceptedFileTypes([
                        'application/pdf',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_dokumen')
                    ->label('Nama Dokumen')
                    ->searchable()
                    ->wrap(),

                BadgeColumn::make('tipe')
                    ->colors([
                        'primary' => 'UMUM',
                    ]),

                TextColumn::make('tanggal')
                    ->date('d M Y')
                    ->sortable(),

                IconColumn::make('file')
                    ->label('Berkas')
                    ->icon('heroicon-o-document-text')
                    ->color('success'),
            ])
            ->defaultSort('tanggal', 'desc')
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Lihat'),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->label('Hapus'),
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
            'index' => Pages\ListDokumenPerencanaans::route('/'),
            'create' => Pages\CreateDokumenPerencanaan::route('/create'),
            'edit' => Pages\EditDokumenPerencanaan::route('/{record}/edit'),
        ];
    }
}
