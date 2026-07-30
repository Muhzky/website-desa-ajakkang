<?php
// app/Filament/Resources/KontakResource.php
namespace App\Filament\Resources;

use App\Filament\Resources\KontakResource\Pages;
use App\Models\Kontak;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Notifications\Notification;


class KontakResource extends Resource
{
    protected static ?string $model = Kontak::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?int $navigationSort = 21;
    protected static ?string $navigationLabel = 'Kontak & Saran';
    protected static ?string $navigationGroup = 'Pengaduan & Kontak';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('subject')->limit(30)
                    ->label('Subjek'),
                Tables\Columns\TextColumn::make('message')->limit(30)
                    ->label('Pesan')
                    ->wrap(),

                Tables\Columns\IconColumn::make('is_read')
                    ->boolean()
                    ->label('Dibaca'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),

                Tables\Actions\Action::make('tandai_dibaca')
                    ->label('Tandai Dibaca')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(function (Kontak $record, Tables\Actions\Action $action) {
                        $record->update(['is_read' => true]);
                        $action->success(); // 🔥 WAJIB
                    })
                    ->successNotification(
                        Notification::make()
                            ->title('Pesan ditandai sebagai dibaca')
                            ->success()
                    )
                    ->visible(fn(Kontak $record) => !$record->is_read),
            ])
            ->defaultSort('created_at', 'desc');
    }



    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama')->disabled(),
            Forms\Components\TextInput::make('email')->disabled(),
            Forms\Components\TextInput::make('subject')->disabled(),
            Forms\Components\Textarea::make('message')
                ->rows(6)
                ->disabled(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKontaks::route('/'),
            'view'  => Pages\ViewKontak::route('/{record}'),
        ];
    }
}
