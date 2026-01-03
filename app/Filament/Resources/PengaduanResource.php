<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengaduanResource\Pages;
use App\Filament\Resources\PengaduanResource\RelationManagers;
use App\Models\Pengaduan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ImageColumn;

class PengaduanResource extends Resource
{
    protected static ?string $model = Pengaduan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 14;
    protected static ?string $navigationGroup = 'Pengaduan & Aspirasi';
    public static function getPluralModelLabel(): string
    {
        return 'Pengaduan';
    }


    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama')->disabled(),
            Forms\Components\TextInput::make('nomor_hp')->disabled(),
            Forms\Components\Select::make('kategori')
                ->options([
                    'infrastruktur' => 'Infrastruktur',
                    'pelayanan' => 'Pelayanan',
                    'keamanan' => 'Keamanan',
                    'lainnya' => 'Lainnya',
                ])
                ->disabled(),

            Forms\Components\Textarea::make('isi_pengaduan')
                ->rows(5)
                ->disabled(),

            Forms\Components\FileUpload::make('foto_bukti')
                ->disk('public')
                ->directory('pengaduan')
                ->disabled(),

            Forms\Components\Select::make('status')
                ->options([
                    'baru' => 'Baru',
                    'diproses' => 'Diproses',
                    'selesai' => 'Selesai',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto_bukti')
                    ->label('Foto')
                    ->disk('public')
                    ->width(200)
                    ->height(150)
                    ->square()
                    ->extraImgAttributes(['style' => 'border: 2.5px solid #ccc; border-radius: 10px;']),


                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('nomor_hp')
                    ->label('Nomor HP'),

                Tables\Columns\TextColumn::make('kategori')
                    ->badge(),
                    
                Tables\Columns\TextColumn::make('isi_pengaduan')
                    ->label('Isi Pengaduan')
                    ->limit(18)
                    ->wrap(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'danger' => 'baru',
                        'warning' => 'diproses',
                        'success' => 'selesai',
                    ]),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dikirim')
                    ->dateTime('d M Y'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Lihat'),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->label('Hapus'),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListPengaduans::route('/'),
            'create' => Pages\CreatePengaduan::route('/create'),
            'edit' => Pages\EditPengaduan::route('/{record}/edit'),
        ];
    }
}
