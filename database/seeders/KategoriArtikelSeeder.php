<?php

namespace Database\Seeders;

use App\Models\KategoriArtikel;
use Illuminate\Database\Seeder;

class KategoriArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Informasi',
            'Prestasi',
            'Teknologi'
        ];
        foreach ($data as $item) {
            KategoriArtikel::create([
                'nama' => $item,
                'slug' => str()->slug($item),
            ]);
        }
    }
}
