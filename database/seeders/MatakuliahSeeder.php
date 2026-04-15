<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $matkul = ['Pemrograman Web', 'Basis Data', 'Jaringan Komputer', 'Sistem Operasi', 'Kecerdasan Buatan'];

        foreach($matkul as $m){
            DB::table('matakuliah')->insert([
                'kode_mk' => strtoupper($faker->unique()->bothify('??###')), // Contoh: IF102
                'nama_matakuliah' => $m,
                'sks' => $faker->numberBetween(2, 4),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
