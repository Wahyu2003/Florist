<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    use HasFactory;

    protected $table = 'detail_pesanans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'pesanan_id', 'tanaman_id', 'quantity', 'sub_harga'
    ];

    public function order()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id');
    }

    public function plant()
    {
        return $this->belongsTo(Plants::class, 'tanaman_id', 'id');
    }
}