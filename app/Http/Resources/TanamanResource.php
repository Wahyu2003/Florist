<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TanamanResource extends JsonResource
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
            'nama_tanaman' => $this->nama_tanaman,
            'image_tanaman' => $this->image_tanaman,
            'kategori_tanaman' => $this->kategori_tanaman,
            'deskripsi_tanaman' => $this->deskripsi_tanaman,
            'size_tanaman' => $this->size_tanaman,
            'suhu_tanaman' => $this->suhu_tanaman,
            'kelembapan_tanaman' => $this->kelembapan_tanaman,
            'harga_tanaman' => $this->harga_tanaman,
            'stok_tanaman' => $this->stok_tanaman,
            // 'status_tanaman' => $this->status_tanaman,
        ];
    }
}
