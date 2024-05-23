<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'email', 'image', 'password', 'alamat_rumah', 'no_telp', 'tanggal_lahir', 'jenis_kelamin',
    ];

    public function orders()
    {
        return $this->hasMany(Pesanan::class, 'user_id', 'id');
    }
}