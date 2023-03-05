<?php

namespace Database\Seeders;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoriBerita = KategoriArtikel::all()->count();

        for ($i = 0; $i < 10; $i++) {

            $judul = fake()->sentence();
            Artikel::create([
                'kategori_artikel_id' => rand(1, $kategoriBerita),
                'judul' => $judul,
                'slug' => str()->slug($judul),
                'tanggal' => fake()->date(),
                'gambar' => null,
                'content' => fake()->paragraph(rand(6,10)),
            ]);
        }
    }
}
