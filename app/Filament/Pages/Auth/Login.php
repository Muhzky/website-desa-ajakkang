<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;

class Login extends BaseLogin
{
    // Jika kamu ingin custom view, uncomment baris ini:
    // protected static string $view = 'filament.pages.auth.login';

    public function getHeading(): string
    {
        return 'Admin Desa Ajakkang';
    }
}
