<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;

class Login extends BaseLogin
{
    // cara paling stabil: set heading sebagai property
    protected ?string $heading = 'Admin Desa Ajakkang';
}
