<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GaleriResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($this->gambar == null) {
            $gambar = request()->root() . "/img/artikel.jpg";
        } else {
            $gambar = request()->root() . "/storage/$this->gambar";
        }

        return [
            'id' => $this->id,
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
            'gambar' => $gambar,
        ];
    }
}
