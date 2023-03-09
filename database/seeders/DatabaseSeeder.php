<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            KategoriArtikelSeeder::class,
            ArtikelSeeder::class,
            JabatanSeeder::class,
            AngkatanSeeder::class,
            VisiMisiSeeder::class,
            AnggotaSeeder::class,
            AlumniSeeder::class,
            HalamanDepanSeeder::class,
            GaleriSeeder::class,
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);
    }
}
