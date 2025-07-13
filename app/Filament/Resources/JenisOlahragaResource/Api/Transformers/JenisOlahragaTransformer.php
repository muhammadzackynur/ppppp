<?php

namespace App\Filament\Resources\JenisOlahragaResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class JenisOlahragaTransformer extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'image' => $this->image,

            // PASTIKAN BARIS INI ADA:
            // Ganti 'kalori_per_jam' jika nama kolom di database Anda berbeda.
            'kalori_per_jam' => $this->kalori_per_jam,

            // Anda juga bisa menambahkan data lain jika perlu
            'kategori' => $this->kategori,
            'durasi_menit' => $this->durasi_menit,
        ];
    }
}