<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TabelASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tabel_a')->insert([
            'kode_lama' => '6',
        ]);
        DB::table('tabel_a')->insert([
            'kode_lama' => null,
        ]);
        DB::table('tabel_a')->insert([
            'kode_lama' => '7',
        ]);
        DB::table('tabel_a')->insert([
            'kode_lama' => '9',
        ]);
        DB::table('tabel_a')->insert([
            'kode_lama' => '8',
        ]);
    }
}
