<?php

namespace Database\Seeders;

use App\Models\Anggota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'jabatan_id' => 1,
                'nama' => 'La Ode Yamin Arsy Fadillah Mbota',
            ],
            [
                'jabatan_id' => 2,
                'nama' => 'Sarman Chisara',
            ],
            
            [
                'jabatan_id' => 3,
                'nama' => 'Safal',
            ],
            
            [
                'jabatan_id' => 4,
                'nama' => 'Lily Aprilyani S.',
            ],
            [
                'jabatan_id' => 5,
                'nama' => 'Raihan De laindi',
            ],
            
            [
                'jabatan_id' => 6,
                'nama' => 'Muh. Nur Iksan',
            ],
            [
                'jabatan_id' => 7,
                'nama' => 'Aulia Rahman Asdar',
            ],
            [
                'jabatan_id' => 8,
                'nama' => 'Muhamad Amhar Rayadin',
            ],
            [
                'jabatan_id' => 9,
                'nama' => 'Muh. Abdillah',
            ],
            [
                'jabatan_id' => 10,
                'nama' => 'Nabila Salsa Billa',
            ],
            [
                'jabatan_id' => 11,
                'nama' => 'Tasya Berlianiswah Bunduwula',
            ],
            [
                'jabatan_id' => 12,
                'nama' => 'La Ode Muhamad Fajar',
            ],
            [
                'jabatan_id' => 13,
                'nama' => 'La Ode Jafar Umar Thalib',
            ],
            [
                'jabatan_id' => 14,
                'nama' => 'Muhammad Rahmat Dhyan Fahruddin',
            ],
        ];

        foreach ($data as $i => $item) {
            Anggota::create([
                'jabatan_id' => $item['jabatan_id'],
                'nama' => $item['nama'],
            ]);
        }
    }
}
