<?php

// app/Models/Kontak.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $fillable = [
    'nama',
    'email',
    'subject',
    'message',
    'is_read',
];

}
