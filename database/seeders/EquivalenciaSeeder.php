<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EquivalenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // Definir las relaciones actuales
        $equivalencias = [
            ['asignatura_1' => 1, 'asignatura_2' => 25],
            ['asignatura_1' => 1, 'asignatura_2' => 49],
            ['asignatura_1' => 1, 'asignatura_2' => 71],
            ['asignatura_1' => 1, 'asignatura_2' => 96],
            ['asignatura_1' => 1, 'asignatura_2' => 118],
            ['asignatura_1' => 1, 'asignatura_2' => 141],
            ['asignatura_1' => 2, 'asignatura_2' => 26],
            ['asignatura_1' => 2, 'asignatura_2' => 50],
            ['asignatura_1' => 2, 'asignatura_2' => 72],
            ['asignatura_1' => 2, 'asignatura_2' => 95],
            ['asignatura_1' => 2, 'asignatura_2' => 119],
            ['asignatura_1' => 2, 'asignatura_2' => 142],
            ['asignatura_1' => 3, 'asignatura_2' => 27],
            ['asignatura_1' => 3, 'asignatura_2' => 51],
            ['asignatura_1' => 3, 'asignatura_2' => 73],
            ['asignatura_1' => 3, 'asignatura_2' => 120],
            ['asignatura_1' => 3, 'asignatura_2' => 143],
            ['asignatura_1' => 4, 'asignatura_2' => 28],
            ['asignatura_1' => 4, 'asignatura_2' => 52],
            ['asignatura_1' => 4, 'asignatura_2' => 74],
            ['asignatura_1' => 4, 'asignatura_2' => 123],
            ['asignatura_1' => 4, 'asignatura_2' => 144],
            ['asignatura_1' => 5, 'asignatura_2' => 29],
            ['asignatura_1' => 5, 'asignatura_2' => 53],
            ['asignatura_1' => 5, 'asignatura_2' => 75],
            ['asignatura_1' => 5, 'asignatura_2' => 122],
            ['asignatura_1' => 6, 'asignatura_2' => 30],
            ['asignatura_1' => 6, 'asignatura_2' => 54],
            ['asignatura_1' => 6, 'asignatura_2' => 76],
            ['asignatura_1' => 6, 'asignatura_2' => 121],
            ['asignatura_1' => 7, 'asignatura_2' => 31],
            ['asignatura_1' => 7, 'asignatura_2' => 55],
            ['asignatura_1' => 7, 'asignatura_2' => 77],
            ['asignatura_1' => 7, 'asignatura_2' => 102],
            ['asignatura_1' => 7, 'asignatura_2' => 124],
            ['asignatura_1' => 8, 'asignatura_2' => 33],
            ['asignatura_1' => 8, 'asignatura_2' => 57],
            ['asignatura_1' => 8, 'asignatura_2' => 79],
            ['asignatura_1' => 8, 'asignatura_2' => 129],
            ['asignatura_1' => 10, 'asignatura_2' => 34],
            ['asignatura_1' => 10, 'asignatura_2' => 58],
            ['asignatura_1' => 10, 'asignatura_2' => 80],
            ['asignatura_1' => 10, 'asignatura_2' => 127],
            ['asignatura_1' => 11, 'asignatura_2' => 35],
            ['asignatura_1' => 11, 'asignatura_2' => 59],
            ['asignatura_1' => 11, 'asignatura_2' => 81],
            ['asignatura_1' => 11, 'asignatura_2' => 106],
            ['asignatura_1' => 11, 'asignatura_2' => 129],
            ['asignatura_1' => 12, 'asignatura_2' => 36],
            ['asignatura_1' => 12, 'asignatura_2' => 82],
            ['asignatura_1' => 15, 'asignatura_2' => 39],
            ['asignatura_1' => 15, 'asignatura_2' => 62],
            ['asignatura_1' => 15, 'asignatura_2' => 85],
            ['asignatura_1' => 32, 'asignatura_2' => 56],
            ['asignatura_1' => 32, 'asignatura_2' => 78],
            ['asignatura_1' => 37, 'asignatura_2' => 83],
            ['asignatura_1' => 37, 'asignatura_2' => 130],
            ['asignatura_1' => 38, 'asignatura_2' => 84],
            ['asignatura_1' => 38, 'asignatura_2' => 131]
        ];

        // Crear una estructura para almacenar las equivalencias por asignatura_1
        $equivalenciasPorAsignatura = [];
        foreach ($equivalencias as $equivalencia) {
            $asignatura1 = $equivalencia['asignatura_1'];
            $asignatura2 = $equivalencia['asignatura_2'];
            if (!isset($equivalenciasPorAsignatura[$asignatura1])) {
                $equivalenciasPorAsignatura[$asignatura1] = [];
            }
            $equivalenciasPorAsignatura[$asignatura1][] = $asignatura2;
        }

        // Generar todas las combinaciones transitivas
        $transitivas = [];
        foreach ($equivalenciasPorAsignatura as $asignatura1 => $asignaturas2) {
            $count = count($asignaturas2);
            for ($i = 0; $i < $count; $i++) {
                for ($j = $i + 1; $j < $count; $j++) {
                    $transitivas[] = ['asignatura_1' => $asignaturas2[$i], 'asignatura_2' => $asignaturas2[$j]];
                    $transitivas[] = ['asignatura_1' => $asignaturas2[$j], 'asignatura_2' => $asignaturas2[$i]];
                }
            }
        }

        // Combinar con las relaciones originales y eliminar duplicados
        $allEquivalencias = array_merge($equivalencias, $transitivas);
        $allEquivalencias = array_map("unserialize", array_unique(array_map("serialize", $allEquivalencias)));

        // Insertar en la base de datos
        DB::table('equivalencia')->insert($allEquivalencias);



    }
}
