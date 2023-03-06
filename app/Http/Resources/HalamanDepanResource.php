<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HalamanDepanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $content = $this->content;
        if ($this->kategori == 'slider' || $this->kategori == 'foto kahim' || $this->kategori == 'foto wakahim') {
            $content = request()->root() . "/storage/$this->content";
        }

        return [
            'kategori' => $this->kategori,
            'content' => $content,
        ];
    }
}
