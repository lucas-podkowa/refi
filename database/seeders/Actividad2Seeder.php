<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Actividad2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('actividad')->where('id', 11)->update([
            'nombre' => 'Evaluación Integradora RA1'
        ]);
        DB::table('actividad')->where('id', 12)->update([
            'nombre' => 'Evaluación Integradora RA2'
        ]);
        DB::table('actividad')->where('id', 13)->update([
            'nombre' => 'Evaluación Integradora RA3'
        ]);

        DB::table('actividad')->where('id', 14)->update([
            'nombre' => 'Evaluación Integradora RA4'
        ]);

        DB::table('actividad')->where('id', 15)->update([
            'nombre' => 'Evaluación Integradora RA5'
        ]);
    }
}
