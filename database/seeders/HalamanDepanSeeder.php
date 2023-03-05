<?php

namespace Database\Seeders;

use App\Models\HalamanDepan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HalamanDepanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HalamanDepan::create([
            'kategori' => 'slider',
            'content' => 'slider/slider-1.jpg'
        ]);
        HalamanDepan::create([
            'kategori' => 'slider',
            'content' => 'slider/slider-2.jpg'
        ]);

        HalamanDepan::create([
            'kategori' => 'tentang',
            'content' => 'Himpunan Mahasiswa Teknik Informatika merupakan salah satu Organisasi Kemahasiswaan di bawah naungan Jurusan Teknik Informatika Fakultas Teknik, Universitas Haluoleo. Himpunan Mahasiswa Jurusan Teknik Informatika memiliki tujuan untuk membantu melancarkan segala kegiatan pendidikan di jurusan dengan ikut memelihara, menumbuhkan, meningkatkan, dan mendayagunakan kemampuan yang ada pada Mahasiswa Jurusan Teknik Informatika.',
        ]);
        HalamanDepan::create([
            'kategori' => 'kepengurusan',
            'content' => 'Secara umum Himpunan Mahasiswa Teknik Informatika dipimpin oleh Ketua dan Wakil Ketua yang bertugas mengkoordinir anggotanya. Pada kepengurusan saat ini, Himpunan Mahasiswa Teknik Informatika dipimpin oleh Muh. Yamin sebagai Ketua HMTI FT-UHO 2022-2023 didampingi oleh Sarman Chisara sebagai Wakil Ketua HMTI FT-UHO 2022-2023.',
        ]);

        HalamanDepan::create([
            'kategori' => 'visi',
            'content' => 'Mewujudkan kekeluargaan HMTI FT-UHO yang mempunyai solidaritas yang tinggi.'
        ]);

        HalamanDepan::create([
            'kategori' => 'misi',
            'content' => 'Menjadi wadah dalam mengembangkan potensi minat dan bakat mahasiswa Teknik Informatika dalam bidang akademik dan non akademik.'
        ]);
        HalamanDepan::create([
            'kategori' => 'misi',
            'content' => 'Mengadakan kelas pembelajaran dan latihan dasar kepemimpinan (pra LDK).'
        ]);
        HalamanDepan::create([
            'kategori' => 'misi',
            'content' => 'Merekapitulasi dan melaksanakan program kerja yang belum sempat terlaksana di periode sebelumnya.'
        ]);
        HalamanDepan::create([
            'kategori' => 'misi',
            'content' => 'Mempererat dan Memperluas relasi/hubungan HMTI dalam lingkungan internal maupun eksternal.'
        ]);

        HalamanDepan::create([
            'kategori' => 'foto kahim',
            'content' => 'foto-home/foto-1.jpg'
        ]);
        HalamanDepan::create([
            'kategori' => 'foto wakahim',
            'content' => 'foto-home/foto-2.jpg'
        ]);
        
    }
}
