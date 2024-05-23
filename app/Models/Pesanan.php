<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id', 'total_harga', 'bukti_bayar', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id', 'id');
    }

    public function orderItems()
    {
        return $this->hasMany(DetailPesanan::class, 'pesanan_id', 'id');
    }
}
