<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendudukResource\Pages;
use App\Models\Penduduk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use App\Models\Keluarga;
use Filament\Forms\Get;
use Filament\Forms\Set;



class PendudukResource extends Resource
{
    protected static ?string $model = Penduduk::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Administrasi Penduduk';
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationLabel = 'Data Penduduk';
    protected static ?string $pluralModelLabel = 'Data Penduduk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Data Penduduk')
                    ->description('Data identitas penduduk desa')
                    ->schema([

                        Forms\Components\Select::make('keluarga_id')
                            ->label('No KK')
                            ->relationship('keluarga', 'no_kk')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function ($state, Set $set) {
                                $keluarga = Keluarga::find($state);

                                if ($keluarga) {
                                    $set('alamat', $keluarga->alamat);
                                    $set('rt', $keluarga->rt);
                                    $set('rw', $keluarga->rw);
                                }
                            }),

                        Forms\Components\TextInput::make('nik')
                            ->label('NIK')
                            ->numeric()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(16),

                        Forms\Components\TextInput::make('nama')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Select::make('jenis_kelamin')
                            ->label('Jenis Kelamin')
                            ->required()
                            ->options([
                                'L' => 'Laki-laki',
                                'P' => 'Perempuan',
                            ])
                            ->native(false),

                        Forms\Components\DatePicker::make('tanggal_lahir')
                            ->label('Tanggal Lahir')
                            ->native(false)
                            ->required(),

                        Forms\Components\Textarea::make('alamat')
                            ->label('Alamat')
                            ->rows(3)
                            ->required(),

                        Forms\Components\TextInput::make('rt')
                            ->label('RT')
                            ->numeric()
                            ->required()
                            ->maxLength(3),

                        Forms\Components\TextInput::make('rw')
                            ->label('RW')
                            ->numeric()
                            ->required()
                            ->maxLength(3),

                        Forms\Components\Select::make('agama')
                            ->label('Agama')
                            ->required()
                            ->options([
                                'Islam' => 'Islam',
                                'Kristen' => 'Kristen',
                                'Katolik' => 'Katolik',
                                'Hindu' => 'Hindu',
                                'Buddha' => 'Buddha',
                                'Konghucu' => 'Konghucu',
                            ])
                            ->native(false),

                        Forms\Components\Select::make('status')
                            ->label('Status Perkawinan')
                            ->required()
                            ->options([
                                'Belum Kawin' => 'Belum Kawin',
                                'Kawin' => 'Kawin',
                                'Cerai Hidup' => 'Cerai Hidup',
                                'Cerai Mati' => 'Cerai Mati',
                            ])
                            ->native(false),

                        Forms\Components\Select::make('pendidikan')
                            ->label('Pendidikan Terakhir')
                            ->required()
                            ->options([
                                'Tidak / Belum Sekolah' => 'Tidak / Belum Sekolah',
                                'SD / Sederajat' => 'SD / Sederajat',
                                'SMP / Sederajat' => 'SMP / Sederajat',
                                'SMA / Sederajat' => 'SMA / Sederajat',
                                'Diploma' => 'Diploma',
                                'Sarjana' => 'Sarjana',
                                7 => 'Pasca Sarjana',
                            ])
                            ->native(false),

                        Forms\Components\Select::make('pekerjaan')
                            ->label('Pekerjaan')
                            ->required()
                            ->options([
                                'Tidak Bekerja' => 'Tidak Bekerja',
                                'Pelajar / Mahasiswa' => 'Pelajar / Mahasiswa',
                                'PNS / ASN' => 'PNS / ASN',
                                'TNI' => 'TNI',
                                'Polri' => 'Polri',
                                'Karyawan Swasta' => 'Karyawan Swasta',
                                'Wiraswasta' => 'Wiraswasta',
                                'Petani / Pekebun' => 'Petani / Pekebun',
                                'Nelayan' => 'Nelayan',
                                'Buruh Harian Lepas' => 'Buruh Harian Lepas',
                                'Lainnya' => 'Lainnya',
                            ])
                            ->native(false),





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

                        Select::make('status_mutasi')
                            ->label('Status Mutasi')
                            ->required()
                            ->options([
                                'tetap' => 'Tetap',
                                'datang' => 'Datang',
                                'pindah' => 'Pindah',
                                'lahir' => 'Lahir',
                                'meninggal' => 'Meninggal',
                            ])
                            ->native(false)
                    ])

                    ->columns(2),


            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nik')
                    ->searchable(),

                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('jenis_kelamin')
                    ->label('JK'),
                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->date(),
                Tables\Columns\TextColumn::make('keluarga.alamat')
                    ->label('Alamat')
                    ->limit(30),
                Tables\Columns\TextColumn::make('keluarga.rt')
                    ->label('RT'),

                Tables\Columns\TextColumn::make('keluarga.rw')
                    ->label('RW'),
                Tables\Columns\TextColumn::make('agama'),
                Tables\Columns\TextColumn::make('pekerjaan'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }



    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenduduks::route('/'),
            'create' => Pages\CreatePenduduk::route('/create'),
            'edit' => Pages\EditPenduduk::route('/{record}/edit'),
        ];
    }
}
