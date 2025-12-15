use Filament\Actions\Action;

protected function getHeaderActions(): array
{
    return [
        Action::make('halamanWeb')
            ->label('→ Halaman Web')
            ->icon('heroicon-o-globe-alt')
            ->url(url('/'), shouldOpenInNewTab: true)
            ->color('success'),
    ];
}
