<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('actividad')->where('id', 7)->update([
            'nombre' => '4º Parcial'
        ]);

        DB::table('actividad')->where('id', 8)->update([
            'nombre' => 'Recuperatorio 4º Parcial'
        ]);
    }
}
