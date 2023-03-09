<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Galeri::create([
                'judul' => fake()->title(),
                'slug' => str()->slug(fake()->title()),
                'deskripsi' => fake()->sentence(),
                'gambar' => 'https://www.tataruang.id/wp-content/uploads/2022/12/pemandangan-alam-di-sekitar-rumah-780x470.jpg'
            ]);
        }
    }
}
