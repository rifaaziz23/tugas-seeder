<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $dosenIDs = DB::table('dosen')->pluck('nidn')->toArray();
        $matkulIDs = DB::table('matakuliah')->pluck('kode_mk')->toArray();
        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

        for($i = 1; $i <= 15; $i++){
            DB::table('jadwal')->insert([
                'kode_mk' => $faker->randomElement($matkulIDs),
                'nidn' => $faker->randomElement($dosenIDs),
                'kelas' => $faker->randomElement(['A', 'B', 'C']),
                'hari' => $faker->randomElement($hari),
                'jam' => $faker->dateTimeBetween('now', '+1 month'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
