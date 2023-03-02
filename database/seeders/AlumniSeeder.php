<?php

namespace Database\Seeders;

use App\Models\Alumni;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            Alumni::create([
                'angkatan_id' => rand(1, 3),
                'nama' => fake()->name(),
                'foto' => null,
            ]);
        }
    }
}
