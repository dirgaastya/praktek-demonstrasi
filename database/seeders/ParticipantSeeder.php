<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skemaCodes = ['SKM-001', 'SKM-002', 'SKM-003', 'SKM-004'];
        $faker = Faker::create();

        foreach ($skemaCodes as $skemaCode) {
            DB::table('participants')->insert([
                'kd_skema' => $skemaCode,
                'nm_peserta' => $faker->name,
                'jekel' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'alamat' => $faker->address,
                'no_hp' => $faker->phoneNumber,
            ]);
        }
    }
}
