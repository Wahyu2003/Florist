<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User_Pengguna extends Model
{

    use HasFactory;
    
    /**
     * fillable
     *
     * @var array
     */
    
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'nama_lengkap', 'foto_profil', 'jenis_kelamin',
        'tanggal_lahir','username','password', 'email',
         'alamat_rumah', 'no_telp',
    ];
     /**
     * image
     *
     * @return Attribute
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($foto_profil) => url('/storage/posts/' . $foto_profil),
        );
    }
}
