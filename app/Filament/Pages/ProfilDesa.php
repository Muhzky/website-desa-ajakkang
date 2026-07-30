<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Form;
use App\Models\ProfilDesa as ProfilDesaModel;
use Filament\Notifications\Notification;


class ProfilDesa extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationLabel = 'Profil Desa';
    protected static ?string $navigationGroup = 'Profil Desa';
    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.profil-desa';

    public ?array $data = [];

    public function mount(): void
    {
        $profil = ProfilDesaModel::firstOrCreate([]);

        $this->form->fill([
            'sub_judul' => $profil->sub_judul,
            'sejarah'   => $profil->sejarah,
            'visi'      => $profil->visi,
            'misi'      => $profil->misi,
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('sub_judul')
                    ->label('Sub Judul')
                    ->maxLength(255),

                Forms\Components\Textarea::make('sejarah')
                    ->label('Sejarah Desa')
                    ->rows(6),

                Forms\Components\Textarea::make('visi')
                    ->label('Visi')
                    ->rows(4),

                Forms\Components\Textarea::make('misi')
                    ->label('Misi')
                    ->rows(6),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $profil = ProfilDesaModel::firstOrCreate([]);

        $profil->update($this->form->getState());

        Notification::make()
            ->title('Berhasil')
            ->body('Profil Desa berhasil diperbarui')
            ->success()
            ->send();
    }
}
