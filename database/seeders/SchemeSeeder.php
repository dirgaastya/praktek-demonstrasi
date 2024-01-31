<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SchemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schemes')->insert([
            'kd_skema' => 'SKM-001',
            'nm_skema' => 'Junior Web Developer',
            'jenis' => 'KKNI',
            'jml_unit' => 6
        ]);
        DB::table('schemes')->insert([
            'kd_skema' => 'SKM-002',
            'nm_skema' => 'Digital Marketing',
            'jenis' => 'Klaster',
            'jml_unit' => 10
        ]);
        DB::table('schemes')->insert([
            'kd_skema' => 'SKM-003',
            'nm_skema' => 'Desainer Multimedia Muda',
            'jenis' => 'KKNI',
            'jml_unit' => 10
        ]);
        DB::table('schemes')->insert([
            'kd_skema' => 'SKM-004',
            'nm_skema' => 'Network Administrator Muda',
            'jenis' => 'KKNI',
            'jml_unit' => 5
        ]);
    }
}
