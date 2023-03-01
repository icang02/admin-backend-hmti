<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Ketua',
            'Wakil Ketua',
            'Sekretaris',
            'Bendahara',
            'Kementerian Keagamaan',
            'Kementerian Kaderisasi',
            'Kementerian Riset dan Teknologi',
            'Kementerian Media Komunikasi & Informasi',
            'Kementerian Seni dan Olahraga',
            'Kementerian Sumber Daya dan Penalaran',
            'Kementerian Ekonomi Kreatif',
            'Kementerian Advokasi dan Pergerakan',
            'Kementerian Sosial dan Humas',
            'Kementerian Kesekretariatan',
        ];

        foreach ($data as $item) {
            Jabatan::create([
                'nama' => $item,
            ]);
        }
    }
}
