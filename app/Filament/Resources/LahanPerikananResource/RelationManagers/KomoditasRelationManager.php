<?php

namespace App\Filament\Resources\LahanPerikananResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;

use Filament\Resources\RelationManagers\RelationManager;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Actions;

class KomoditasRelationManager extends RelationManager
{
    protected static string $relationship = 'komoditas';
    protected static ?string $title = 'Komoditas Perikanan';

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nama_komoditas')
                ->label('Nama Komoditas')
                ->required()
                ->maxLength(100),

            Select::make('jenis')
                ->label('Jenis Perairan')
                ->options([
                    'Air Tawar' => 'Air Tawar',
                    'Air Payau' => 'Air Payau',
                    'Air Laut'  => 'Air Laut',
                ])
                ->required(),

            TextInput::make('musim_tebar')
                ->label('Musim Tebar'),

            TextInput::make('estimasi_panen_hari')
                ->label('Estimasi Panen')
                ->numeric()
                ->suffix('hari'),

            TextInput::make('rata_rata_hasil')
                ->label('Rata-rata Hasil')
                ->numeric()
                ->suffix('Kg'),

            Toggle::make('is_active')
                ->label('Status Aktif')
                ->default(true),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_komoditas')
                    ->label('Komoditas')
                    ->searchable()
                    ->sortable(),

                BadgeColumn::make('jenis')
                    ->label('Jenis Perairan')
                    ->colors([
                        'success' => 'Air Tawar',
                        'warning' => 'Air Payau',
                        'primary' => 'Air Laut',
                    ]),

                TextColumn::make('musim_tebar')
                    ->label('Musim Tebar')
                    ->toggleable(),

                TextColumn::make('estimasi_panen_hari')
                    ->label('Estimasi Panen')
                    ->suffix(' hari'),

                TextColumn::make('rata_rata_hasil')
                    ->label('Rata-rata Hasil')
                    ->suffix(' Kg'),

                BadgeColumn::make('is_active')
                    ->label('Status')
                    ->formatStateUsing(fn($state) => $state ? 'Aktif' : 'Nonaktif')
                    ->colors([
                        'success' => fn($state) => $state === true,
                        'gray'    => fn($state) => $state === false,
                    ]),

            ])
            ->headerActions([
                Actions\CreateAction::make()
                    ->label('Tambah Komoditas'),
            ])
            ->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ]);
    }
}
