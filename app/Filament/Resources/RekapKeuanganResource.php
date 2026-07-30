<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RekapKeuanganResource\Pages;
use App\Filament\Resources\RekapKeuanganResource\RelationManagers;
use App\Models\RekapKeuangan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;

class RekapKeuanganResource extends Resource
{
    protected static ?int $navigationSort = 15;
    protected static ?string $model = RekapKeuangan::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationGroup = 'Transparansi';
    public static function getPluralModelLabel(): string
    {
        return 'Rekap Keuangan';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('tahun')
                    ->label('Tahun Anggaran')
                    ->options(
                        collect(range(2020, date('Y')))
                            ->reverse()
                            ->mapWithKeys(fn($tahun) => [$tahun => $tahun])
                            ->toArray()
                    )
                    ->searchable()
                    ->required()
                    ->unique(ignoreRecord: true),

                Forms\Components\TextInput::make('pemasukan')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),

                Forms\Components\TextInput::make('pengeluaran')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tahun')
                    ->label('Tahun Anggaran')
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color('primary'),

                TextColumn::make('pemasukan')
                    ->label('Pemasukan')
                    ->money('IDR', true)
                    ->color('success')
                    ->sortable(),

                TextColumn::make('pengeluaran')
                    ->label('Pengeluaran')
                    ->money('IDR', true)
                    ->color('danger')
                    ->sortable(),

                TextColumn::make('surplus')
                    ->label('Surplus / Defisit')
                    ->state(fn($record) => $record->surplus)
                    ->money('IDR', true)
                    ->color(fn($state) => $state >= 0 ? 'success' : 'danger')
                    ->badge()
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime('d M Y')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('tahun', 'desc')
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
            'index' => Pages\ListRekapKeuangans::route('/'),
            'create' => Pages\CreateRekapKeuangan::route('/create'),
            'edit' => Pages\EditRekapKeuangan::route('/{record}/edit'),
        ];
    }
}
