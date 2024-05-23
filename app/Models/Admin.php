<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';
    protected $table = 'admin';
    protected $primarykey = 'id';
    protected $fillable = [
        'nama_admin', 'username', 'password', 'jenis_kelamin',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
