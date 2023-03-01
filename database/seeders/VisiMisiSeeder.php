<?php

namespace Database\Seeders;

use App\Models\VisiMisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VisiMisi::create([
            'nama' => 'Visi',
            'isi' => '<p>Mewujudkan kekeluargaan HMTI FT-UHO yang mempunyai solidaritas yang tinggi.</p>',
        ]);
        VisiMisi::create([
            'nama' => 'Misi',
            'isi' => '<ul><li>Menjadi wadah dalam mengembangkan potensi minat dan bakat mahasiswa Teknik Informatika dalam bidang akademik dan non akademik.</li><li>Mengadakan kelas pembelajaran dan latihan dasar kepemimpinan (pra LDK)</li><li>Merekapitulasi dan melaksanakan program kerja yang belum sempat terlaksana di periode sebelumnya.</li><li>Mempererat dan Memperluas relasi/hubungan HMTI dalam lingkungan internal maupun eksternal</li></ul>',
        ]);
        VisiMisi::create([
            'nama' => 'Kata Sambutan',
            'isi' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, inventore asperiores fugit enim dolorem ad a rem. Aut, placeat quae?</p>',
        ]);
    }
}
