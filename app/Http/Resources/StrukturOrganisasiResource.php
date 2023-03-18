<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StrukturOrganisasiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($this->foto == null) {
            $foto = request()->root() . "/img/anggota.png";
        } else {
            $foto = request()->root() . "/storage/$this->foto";
        }

        return [
            'id' => $this->id,
            'jabatan' => $this->jabatan->nama,
            'nama' => $this->nama,
            'foto' => $foto,
        ];
    }
}
