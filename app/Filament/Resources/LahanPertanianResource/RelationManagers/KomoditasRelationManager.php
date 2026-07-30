<?php

namespace App\Filament\Resources\LahanPertanianResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Option;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;

use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;

use Filament\Resources\RelationManagers\RelationManager;

class KomoditasRelationManager extends RelationManager
{
    protected static string $relationship = 'komoditas';

    protected static ?string $title = 'Komoditas Pertanian';

    /**
     * ==========================
     * FORM
     * ==========================
     */
    public function form(Form $form): Form
    {
        return $form->schema([

            TextInput::make('nama_komoditas')
                ->label('Nama Komoditas')
                ->required(),

            Select::make('jenis_tanaman')
                ->label('Jenis Tanaman')
                ->options([
                    'Pangan' => 'Pangan',
                    'Hortikultura' => 'Hortikultura',
                    'Perkebunan' => 'Perkebunan',
                ])
                ->native(false)
                ->placeholder('Pilih')
                ->required(),

            Select::make('musim_tanam')
                ->label('Musim Tanam')
                ->required()
                ->options([
                    'Musiman'  => 'Musiman',
                    'Tahunan'  => 'Tahunan',
                    'Bulanan'  => 'Bulanan',
                    'Mingguan' => 'Mingguan',
                ])
                ->native(false)
                ->placeholder('Pilih'),

            TextInput::make('estimasi_panen_hari')
                ->label('Estimasi Panen (Hari)')
                ->numeric()
                ->required()
                ->dehydrateStateUsing(fn($state) => (int) $state),

            TextInput::make('rata_hasil_panen')
                ->label('Rata-rata Hasil')
                ->numeric()
                ->default(0.0)
                ->required()
                ->dehydrateStateUsing(fn($state) => (float) $state),

            TextInput::make('satuan_hasil')
                ->label('Satuan Hasil')
                ->default('Kg'),

            Textarea::make('keterangan')
                ->label('Keterangan'),
        ]);
    }

    /**
     * ==========================
     * TABLE
     * ==========================
     */
    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_komoditas')
                    ->label('Komoditas')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('jenis_tanaman')
                    ->label('Jenis')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Pangan' => 'success',
                        'Hortikultura' => 'warning',
                        'Perkebunan' => 'info',
                        default => 'gray',
                    }),

                TextColumn::make('musim_tanam')
                    ->label('Musim Tanam')
                    ->placeholder('-'),

                TextColumn::make('estimasi_panen_hari')
                    ->label('Estimasi Panen')
                    ->formatStateUsing(fn($state) => $state === null ? '-' : $state . ' hari')
                    ->alignCenter(),


                TextColumn::make('rata_hasil_panen')
                    ->label('Rata-rata Hasil')
                    ->formatStateUsing(function ($state, $record) {
                        if ($state === null) {
                            return '-';
                        }

                        return number_format((float) $state, 2) . ' ' . ($record->satuan_hasil ?? 'Kg');
                    })
                    ->alignEnd(),



                TextColumn::make('is_active')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn($state) => $state ? 'Aktif' : 'Nonaktif')
                    ->color(fn($state) => $state ? 'success' : 'danger'),
            ])
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Komoditas')
                    ->color('success'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->defaultSort('nama_komoditas');
    }
}
