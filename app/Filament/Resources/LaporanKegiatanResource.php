<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporanKegiatanResource\Pages;
use App\Filament\Resources\LaporanKegiatanResource\RelationManagers;
use App\Models\LaporanKegiatan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LaporanKegiatanResource extends Resource
{
    protected static ?int $navigationSort = 17;
    protected static ?string $model = LaporanKegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Transparansi';
    public static function getPluralModelLabel(): string
    {
        return 'Laporan Kegiatan';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('lokasi')
                    ->required(),

                Forms\Components\TextInput::make('anggaran')
                    ->numeric()
                    ->prefix('Rp'),

                Forms\Components\DatePicker::make('tanggal')
                    ->required(),

                Forms\Components\FileUpload::make('foto')
                    ->label('Foto Kegiatan')
                    ->image()
                    ->disk('public')
                    ->directory('laporan-kegiatan/foto')
                    ->imageEditor(),

                Forms\Components\FileUpload::make('file_laporan')
                    ->label('File Laporan')
                    ->disk('public')
                    ->directory('laporan-kegiatan/file')
                    ->acceptedFileTypes([
                        'application/pdf',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                    ])
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
                    ->searchable()
                    ->limit(30)
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('lokasi')
                    ->limit(20),

                Tables\Columns\TextColumn::make('anggaran')
                    ->money('IDR', locale: 'id'),

                Tables\Columns\TextColumn::make('tanggal')
                    ->date('d M Y'),
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
            'index' => Pages\ListLaporanKegiatans::route('/'),
            'create' => Pages\CreateLaporanKegiatan::route('/create'),
            'edit' => Pages\EditLaporanKegiatan::route('/{record}/edit'),
        ];
    }
}
