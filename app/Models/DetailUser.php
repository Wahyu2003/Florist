<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class DetailUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'alamat_rumah',
        'no_telp',
        'tanggal_lahir',
        'jenis_kelamin',
    ];

    // Definisikan relasi belongsTo ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
