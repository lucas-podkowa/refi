<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Carrera;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);


        DB::table('carrera')->insert(
            [
                ['codigo' => 'CI', 'nombre' => 'Ingeniería Civil'], //1
                ['codigo' => 'EM', 'nombre' => 'Ingeniería Electromecánica'], //2
                ['codigo' => 'ET', 'nombre' => 'Ingeniería Electrónica'],
                ['codigo' => 'IN', 'nombre' => 'Ingeniería Industrial'],
                ['codigo' => 'IC', 'nombre' => 'Ingeniería en Computación'],
                ['codigo' => 'IM', 'nombre' => 'Ingeniería Mecatrónica'],
                ['codigo' => 'LHyST', 'nombre' => 'Licenciatura en Higiene y Seguridad en el Trabajo'],
            ]
        );


        DB::table('dictado')->insert([
            ['nombre' => 'Anual'],
            ['nombre' => '1º C.'],
            ['nombre' => '2º C.']
        ]);

        DB::table('asignatura')->insert([
            [
                'nombre' => 'Álgebra y Geometría Analítica',
                'codigo' => 'CI111',
                'ciclo' => 1,
                'responsable' => null,
                'dictado' => 1,
                'carrera' => 1
            ],
            [
                'nombre' => 'Cálculo 1',
                'codigo' => 'CI112',
                'ciclo' => 1,
                'responsable' => null,
                'dictado' => 1,
                'carrera' => 1
            ],
            [
                'nombre' => 'Física 1',
                'codigo' => 'CI121',
                'ciclo' => 1,
                'responsable' => null,
                'dictado' => 1,
                'carrera' => 1
            ],
            [
                'nombre' => 'Química',
                'codigo' => 'CI122',
                'ciclo' => 1,
                'responsable' => null,
                'dictado' => 1,
                'carrera' => 1
            ],
            [
                'nombre' => 'Sistemas de Representación Gráfica',
                'codigo' => 'CI131',
                'ciclo' => 1,
                'responsable' => null,
                'dictado' => 1,
                'carrera' => 1
            ],
            [
                'nombre' => 'Ingeniería y Sociedad',
                'codigo' => 'CI161',
                'ciclo' => 1,
                'responsable' => null,
                'dictado' => 1,
                'carrera' => 1
            ],
            [
                'nombre' => 'Cáclulo 2',
                'codigo' => 'CI211',
                'ciclo' => 2,
                'responsable' => null,
                'dictado' => 2,
                'carrera' => 1
            ],
            [
                'nombre' => 'Física 2',
                'codigo' => 'CI221',
                'ciclo' => 2,
                'responsable' => null,
                'dictado' => 2,
                'carrera' => 1
            ],
            [
                'nombre' => 'Estática',
                'codigo' => 'CI251',
                'ciclo' => 2,
                'responsable' => null,
                'dictado' => 2,
                'carrera' => 1
            ],
            [
                'nombre' => 'Informática',
                'codigo' => 'CI241',
                'ciclo' => 2,
                'responsable' => null,
                'dictado' => 2,
                'carrera' => 1
            ],
            [
                'nombre' => 'Matemática Aplicada',
                'codigo' => 'CI212',
                'ciclo' => 2,
                'responsable' => null,
                'dictado' => 3,
                'carrera' => 1
            ],
            [
                'nombre' => 'Mecánica Racional',
                'codigo' => 'CI222',
                'ciclo' => 2,
                'responsable' => null,
                'dictado' => 3,
                'carrera' => 1
            ],
            [
                'nombre' => 'Resistencia de Materiales',
                'codigo' => 'CI252',
                'ciclo' => 2,
                'responsable' => null,
                'dictado' => 3,
                'carrera' => 1
            ],
            [
                'nombre' => 'Teoría de la Elasticidad',
                'codigo' => 'CI254',
                'ciclo' => 2,
                'responsable' => null,
                'dictado' => 3,
                'carrera' => 1
            ],
            [
                'nombre' => 'Ingeniería e Industrias',
                'codigo' => 'CI261',
                'ciclo' => 2,
                'responsable' => null,
                'dictado' => 3,
                'carrera' => 1
            ]
        ]);
    }
}
