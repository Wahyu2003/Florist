<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plants extends Model
{
    use HasFactory;
    
    protected $table = 'tanaman';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_tanaman', 'image_tanaman',
        'deskripsi_tanaman', 'kategori_tanaman',
        'size_tanaman', 'suhu_tanaman', 
        'kelembapan_tanaman', 'harga_tanaman', 'stok_tanaman',
    ];

    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'tanaman_id', 'id');
    }
}
