<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KrsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $npmIDs = DB::table('mahasiswa')->pluck('npm')->toArray();
        $matkulIDs = DB::table('matakuliah')->pluck('kode_mk')->toArray();

        for($i = 1; $i <= 100; $i++){
            DB::table('krs')->insert([
                'npm' => $faker->randomElement($npmIDs),
                'kode_mk' => $faker->randomElement($matkulIDs),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
