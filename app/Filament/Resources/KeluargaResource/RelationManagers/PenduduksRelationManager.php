<?php

namespace App\Filament\Resources\KeluargaResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Actions\Action;
use App\Filament\Resources\PendudukResource;


class PenduduksRelationManager extends RelationManager
{
    protected static string $relationship = 'penduduks';
    protected static ?string $title = 'Anggota Keluarga';

    public function form(Form $form): Form
    {
        return $form->schema([
            Select::make('status_keluarga')
                ->label('Status Keluarga')
                ->required()
                ->options([
                    1 => 'Kepala Keluarga',
                    2 => 'Istri',
                    3 => 'Anak',
                    4 => 'Orang Tua',
                    5 => 'Lainnya',
                ])
                ->native(false),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nik')->searchable(),
                Tables\Columns\TextColumn::make('nama')->searchable(),

                Tables\Columns\BadgeColumn::make('status_keluarga')
                    ->label('Status')
                    ->formatStateUsing(fn($state) => match ($state) {
                        1 => 'Kepala Keluarga',
                        2 => 'Istri',
                        3 => 'Anak',
                        4 => 'Orang Tua',
                        default => 'Lainnya',
                    })
                    ->color(fn($state) => match ($state) {
                        1 => 'success',
                        2 => 'info',
                        3 => 'warning',
                        4 => 'primary',
                        default => 'gray',
                    }),

                Tables\Columns\IconColumn::make('kk')
                    ->label('KK')
                    ->boolean()
                    ->getStateUsing(fn($record) => $record->isKepalaKeluarga())
                    ->trueIcon('heroicon-o-star')
                    ->falseIcon('heroicon-o-user')
                    ->trueColor('success')
                    ->falseColor('gray'),
            ])
            ->headerActions([
                Action::make('tambahAnggota')
                    ->label('Tambah Anggota')
                    ->icon('heroicon-o-plus')
                    ->color('primary')
                    ->url(fn() => PendudukResource::getUrl('create', [
                        'keluarga_id' => $this->ownerRecord->id,
                    ])),
            ])

            ->actions([
                Tables\Actions\EditAction::make(),

                Tables\Actions\DeleteAction::make()
                    ->visible(fn($record) => ! $record->isKepalaKeluarga()),
            ]);
    }
}
