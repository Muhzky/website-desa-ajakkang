<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BumdesResource\Pages;
use App\Filament\Resources\BumdesResource\RelationManagers;
use App\Models\Bumdes;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\{
    TextInput,
    Select,
    DatePicker,
    FileUpload
};
use Filament\Tables\Columns\{
    TextColumn,
    BadgeColumn
};

use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;

class BumdesResource extends Resource
{
    protected static ?int $navigationSort = 13;
    protected static ?string $model = Bumdes::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Transparansi';
    
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
                    'keuangan' => 'Keuangan',
                    'kegiatan' => 'Kegiatan',
                    'rapat' => 'Rapat',
                    'lampiran' => 'Lampiran',
                ])
                ->required(),

            DatePicker::make('tanggal')
                ->label('Tanggal')
                ->required(),

            FileUpload::make('file')
                ->label('File Dokumen')
                ->disk('public')
                ->directory('bumdes')
                ->preserveFilenames()
                ->acceptedFileTypes([
                    'application/pdf',
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
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
                ->label('Tipe')
                ->colors([
                    'danger' => 'keuangan',
                    'success' => 'kegiatan',
                    'warning' => 'rapat',
                    'primary' => 'lampiran',
                ])
                ->formatStateUsing(fn ($state) => strtoupper($state)),

            TextColumn::make('tanggal')
                ->label('Tanggal')
                ->date('d M Y'),

            IconColumn::make('file')
                ->label('Berkas')
                ->icon('heroicon-o-document-text')
                ->color('success'),
        ])
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
            'index' => Pages\ListBumdes::route('/'),
            'create' => Pages\CreateBumdes::route('/create'),
            'edit' => Pages\EditBumdes::route('/{record}/edit'),
        ];
    }
}
