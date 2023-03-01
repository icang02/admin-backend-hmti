<?php

namespace Database\Seeders;

use App\Models\Angkatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AngkatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Corvus',
            'tahun' => '2020'],
            ['nama' => 'Phoenix',
            'tahun' => '2019'],
            ['nama' => 'Cmos',
            'tahun' => '2018'],
        ];
        foreach ($data as $item) {
            Angkatan::create([
                'nama' => $item['nama'],
                'tahun' => $item['tahun'],
            ]);
        }
    }
}
