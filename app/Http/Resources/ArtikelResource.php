<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtikelResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        if ($this->gambar == null) {
            $gambar = request()->root() . "/img/artikel.jpg"; 
        } else {
            $gambar = request()->root() . "/storage/$this->gambar";
        }

        if (request()->is('api/artikel') || request()->is('api/artikel/kategori*')) {
            return [
                'id' => $this->id,
                'judul' => $this->judul,
                'slug' => $this->slug,
                'kategori_artikel' => $this->kategori_artikel,
                'tanggal' => Carbon::createFromFormat('Y-m-d', $this->tanggal)->format('d F Y'),
                'gambar' => $gambar,
                'content' => $this->content,
            ];
        } else {
            return [
                'id' => $this->id,
                'judul' => $this->judul,
                'slug' => $this->slug,
                'kategori_artikel' => $this->kategori_artikel,
                'tanggal' => Carbon::createFromFormat('Y-m-d', $this->tanggal)->format('d F Y'),
                'gambar' => $gambar,
                'content' => $this->content,
            ];
        }
    }
}
