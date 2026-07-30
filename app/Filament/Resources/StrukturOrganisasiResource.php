<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StrukturOrganisasiResource\Pages;
use App\Models\StrukturOrganisasi;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;

class StrukturOrganisasiResource extends Resource
{
    protected static ?string $model = StrukturOrganisasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationGroup = 'Profil Desa';
    protected static ?int $navigationSort = 3;

    public static function getNavigationLabel(): string
    {
        return 'Struktur Organisasi';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Struktur Organisasi';
    }

    public static function getModelLabel(): string
    {
        return 'Struktur Organisasi';
    }

    public static function getSlug(): string
    {
        return 'struktur-organisasi';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('nama')
                    ->label('Nama Struktur')
                    ->options([
                        'Struktur Organisasi Pemerintah Desa' => 'Struktur Organisasi Pemerintah Desa',
                        'Struktur Organisasi BPD' => 'Struktur Organisasi BPD',
                        'Struktur Organisasi PKK' => 'Struktur Organisasi PKK',
                        'Struktur Organisasi LPM' => 'Struktur Organisasi LPM',
                        'Struktur Organisasi Karang Taruna' => 'Struktur Organisasi Karang Taruna',
                        'Struktur Organisasi Posyandu' => 'Struktur Organisasi Posyandu',
                    ])
                    ->searchable()
                    ->required(),

                Select::make('slug')
                    ->label('Slug (Identitas Halaman)')
                    ->helperText('Digunakan untuk pemanggilan di halaman website')
                    ->options([
                        'pemerintah-desa' => 'pemerintah-desa',
                        'bpd' => 'bpd',
                        'pkk' => 'pkk',
                        'lpm' => 'lpm',
                        'karang-taruna' => 'karang-taruna',
                        'posyandu' => 'posyandu',
                    ])
                    ->required()
                    ->unique(ignoreRecord: true),

                FileUpload::make('gambar')
                    ->label('Gambar Struktur')
                    ->image()
                    ->disk('public')
                    ->directory('struktur')
                    ->maxSize(5120)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(
                fn($query) =>
                $query->orderByRaw("
                CASE 
                    WHEN slug = 'pemerintah-desa' THEN 0
                    ELSE 1
                END
            ")->orderByDesc('created_at')
            )
            ->columns([
                ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->disk('public')
                    ->width(300)
                    ->height(250)
                    ->square()
                    ->extraImgAttributes([
                        'style' => 'border: 2.5px solid #ccc; border-radius: 10px;'
                    ]),

                TextColumn::make('nama')
                    ->label('Nama Struktur')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->badge()
                    ->color(
                        fn($state) =>
                        $state === 'pemerintah-desa' ? 'success' : 'primary'
                    ),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label('Lihat'),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->label('Hapus'),
            ]);
    }


    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListStrukturOrganisasis::route('/'),
            'create' => Pages\CreateStrukturOrganisasi::route('/create'),
            'edit'   => Pages\EditStrukturOrganisasi::route('/{record}/edit'),
        ];
    }
}
