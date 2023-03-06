<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlumniResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($this->foto == null) {
            $foto = $this->foto;
        } else {
            $foto = request()->root() . "/storage/$this->foto";
        }
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'foto' => $foto,
            'tahun' => $this->angkatan->tahun,
        ];
    }
}
