<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\Tanaman;
use App\Http\DetailUser;

class PesananResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama_pembeli' => $this->user->name,
            'alamat_pembeli' => $this->user->detailUser->alamat_rumah ?? 'Alamat tidak tersedia',
            'nama_tanaman' => $this->tanaman->nama_tanaman,
            'image_tanaman' => $this->tanaman->image_tanaman,
            'harga_tanaman' => $this->tanaman->harga_tanaman,
            'jumlah_beli' => $this->jumlah_beli,
            'total_harga' => $this->total_harga,
            'bukti_bayar' => $this->bukti_bayar,
            'status' => $this->status
        ];
    }
}
