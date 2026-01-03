<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransparansiAnggaranResource\Pages;
use App\Filament\Resources\TransparansiAnggaranResource\RelationManagers;
use App\Models\TransparansiAnggaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Actions\Action;

class TransparansiAnggaranResource extends Resource
{
    protected static ?int $navigationSort = 10;
    protected static ?string $model = TransparansiAnggaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Transparansi';
    public static function getPluralModelLabel(): string
    {
        return 'Transparansi Anggaran';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required(),

                Forms\Components\Select::make('tahun')
                    ->options(
                        collect(range(2020, date('Y')))
                            ->reverse()
                            ->mapWithKeys(fn($tahun) => [$tahun => $tahun])
                            ->toArray()
                    )
                    ->required(),

                Forms\Components\Select::make('tipe')
                    ->options([
                        'APBDes Pokok' => 'APBDes Pokok',
                        'APBDes Perubahan' => 'APBDes Perubahan',
                    ])
                    ->required(),

                Forms\Components\DatePicker::make('tanggal')
                    ->required(),

                Forms\Components\FileUpload::make('file')
                    ->disk('public')
                    ->directory('transparansi-anggaran')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')
                    ->label('Judul Dokumen')
                    ->searchable()
                    ->limit(40)
                    ->tooltip(fn($record) => $record->judul)
                    ->weight('medium'),

                TextColumn::make('tahun')
                    ->label('Tahun')
                    ->badge()
                    ->color('primary')
                    ->sortable(),

                TextColumn::make('tipe')
                    ->label('Tipe APBDes')
                    ->badge()
                    ->color(fn($state) => match ($state) {
                        'APBDes Pokok' => 'success',
                        'APBDes Perubahan' => 'warning',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('tanggal')
                    ->label('Tanggal Publikasi')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('file')
                    ->label('Dokumen')
                    ->icon('heroicon-o-document-text')
                    ->iconColor('primary')
                    ->formatStateUsing(fn() => 'Lihat File'),
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
            'index' => Pages\ListTransparansiAnggarans::route('/'),
            'create' => Pages\CreateTransparansiAnggaran::route('/create'),
            'edit' => Pages\EditTransparansiAnggaran::route('/{record}/edit'),
        ];
    }
}
