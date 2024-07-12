<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Carrera;
use Carbon\Carbon;
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

        DB::table('actividad')->insert([
            ['nombre' => 'Examen Final', 'codigo' => 'Final'],
            ['nombre' => 'Examen Parcial', 'codigo' => 'Parcial'],
            ['nombre' => 'Presentación', 'codigo' => 'Pres']
        ]);

        DB::table('dictado')->insert([
            ['nombre' => 'Anual'],
            ['nombre' => '1º C.'],
            ['nombre' => '2º C.']
        ]);

        DB::table('turno')->insert([
            ['nombre' => 'Mañana'],
            ['nombre' => 'Tarde']
        ]);

        DB::table('carrera')->insert(
            [
                ['codigo' => 'CI', 'nombre' => 'Ingeniería Civil'], //1
                ['codigo' => 'EM', 'nombre' => 'Ingeniería Electromecánica'], //2
                ['codigo' => 'ET', 'nombre' => 'Ingeniería Electrónica'], //3
                ['codigo' => 'IN', 'nombre' => 'Ingeniería Industrial'], //4
                ['codigo' => 'IC', 'nombre' => 'Ingeniería en Computación'], //5
                ['codigo' => 'IM', 'nombre' => 'Ingeniería Mecatrónica'],//6
                ['codigo' => 'LHyST', 'nombre' => 'Licenciatura en Higiene y Seguridad en el Trabajo'],
            ]
        );

        DB::table('asignatura')->insert([
            [
                'nombre' => 'Álgebra y Geometría Analítica',
                'codigo' => 'CI111',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 1
            ],//1
            [
                'nombre' => 'Cálculo 1',
                'codigo' => 'CI112',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 1
            ],//2
            [
                'nombre' => 'Física 1',
                'codigo' => 'CI121',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 1
            ],//3
            [
                'nombre' => 'Química',
                'codigo' => 'CI122',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 1
            ],//4
            [
                'nombre' => 'Sistemas de Representación Gráfica',
                'codigo' => 'CI131',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 1
            ],//5
            [
                'nombre' => 'Ingeniería y Sociedad',
                'codigo' => 'CI161',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 1
            ],//6
            [
                'nombre' => 'Cálculo 2',
                'codigo' => 'CI211',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 1
            ],//7
            [
                'nombre' => 'Física 2',
                'codigo' => 'CI221',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 1
            ],//8
            [
                'nombre' => 'Estática',
                'codigo' => 'CI251',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 1
            ],//9
            [
                'nombre' => 'Informática',
                'codigo' => 'CI241',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 1
            ],//10
            [
                'nombre' => 'Matemática Aplicada',
                'codigo' => 'CI212',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 1
            ],//11
            [
                'nombre' => 'Mecánica Racional',
                'codigo' => 'CI222',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 1
            ],//12
            [
                'nombre' => 'Resistencia de Materiales',
                'codigo' => 'CI252',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 1
            ],//13
            [
                'nombre' => 'Teoría de la Elasticidad',
                'codigo' => 'CI254',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 1
            ],//14
            [
                'nombre' => 'Ingeniería e Industrias',
                'codigo' => 'CI261',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 1
            ],//15
            [
                'nombre' => 'Probabilidad y Estadística 1',
                'codigo' => 'CI213',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 1
            ],//16
               [
                'nombre' => 'Mecánica de los Fluidos y Máquinas',
                'codigo' => 'CI332',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 1
            ],//17
            [
                'nombre' => 'Teoría de la Elasticidad',
                'codigo' => 'CI254',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 1
            ],//18
            [
                'nombre' => 'Mecánica de los Suelos',
                'codigo' => 'CI351',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 1
            ],//19
            [
                'nombre' => 'Topografía',
                'codigo' => 'CI352',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 1
            ],//20
            [
                'nombre' => 'Caminos 1',
                'codigo' => 'CI353',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 1
            ],//21
            [
                'nombre' => 'Estructuras',
                'codigo' => 'CI354',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 1
            ],//22
            [
                'nombre' => 'Ciencia de los Materiales',
                'codigo' => 'CI355',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 1
            ],//24
            [
                'nombre' => 'Hidrología',
                'codigo' => 'CI356',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 1
            ],//25
            [
                'nombre' => 'Inglés 1',
                'codigo' => 'CI365',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 1
            ], //26
            [//1º año ElectroMecanica
                'nombre' => 'Álgebra y Geometría Analítica',
                'codigo' => 'EM111',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 2
            ],//27
            [
                'nombre' => 'Cálculo 1',
                'codigo' => 'EM112',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 2
            ],//28
            [
                'nombre' => 'Física 1',
                'codigo' => 'EM121',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 2
            ],//29
            [
                'nombre' => 'Química',
                'codigo' => 'EM122',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 2
            ],//30
            [
                'nombre' => 'Sistemas de Representación Gráfica',
                'codigo' => 'EM131',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 2
            ],//31
            [
                'nombre' => 'Ingeniería y Sociedad',
                'codigo' => 'EM161',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 2
            ],//32
            [//2º año ElectroMecanica
                'nombre' => 'Cálculo 2',
                'codigo' => 'EM211',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 2
            ],//33
            [
                'nombre' => 'Probabilidad y Estadística 1',
                'codigo' => 'EM213',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 2
            ],//34
            [
                'nombre' => 'Física 2',
                'codigo' => 'EM221',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 2
            ],//35
            [
                'nombre' => 'Informática',
                'codigo' => 'EM241',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 2
            ],//36
            [
                'nombre' => 'Matemática Aplicada',
                'codigo' => 'EM212',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 2
            ],//37
            [
                'nombre' => 'Mecánica Racional',
                'codigo' => 'EM222',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 2
            ],//38
            [
                'nombre' => 'Termodinámica',
                'codigo' => 'EM231',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 2
            ],//39
            [
                'nombre' => 'Estática y Resistencia de Materiales',
                'codigo' => 'EM253',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 2
            ],//40
            [
                'nombre' => 'Ingeniería e Industrias',
                'codigo' => 'EM261',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 2
            ],//41
            [
                'nombre' => 'Electrotécnia',
                'codigo' => 'EM331',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 2
            ],//42
            [
                'nombre' => 'Mecánica de los Fluidos y Máquinas',
                'codigo' => 'EM332',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 2
            ],//43
            [
                'nombre' => 'Diseño Aplicado',
                'codigo' => 'EM333',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 2
            ],//44
            [
                'nombre' => 'Máquinas e Instalaciones Térmicas 1',
                'codigo' => 'EM334',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 2
            ],//45
            [
                'nombre' => 'Electrónica',
                'codigo' => 'EM341',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 2
            ],//46
            [
                'nombre' => 'Ciencia de los Materiales',
                'codigo' => 'EM335',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 2
            ],//47
            [
                'nombre' => 'Mediciones y Metrología',
                'codigo' => 'EM336',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 2
            ],//48
            [
                'nombre' => 'Máquinas Eléctricas',
                'codigo' => 'EM337',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 2
            ],//49
            [
                'nombre' => 'Higiene, Seguridad y Medio Ambiente',
                'codigo' => 'EM466',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 2
            ],//50
            [//1º año Ingeniería Electronica
                'nombre' => 'Álgebra y Geometría Analítica',
                'codigo' => 'ET111',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 3
            ],//51
            [
                'nombre' => 'Cálculo 1',
                'codigo' => 'ET112',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 3
            ],//52
            [
                'nombre' => 'Física 1',
                'codigo' => 'ET121',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 3
            ],//53
            [
                'nombre' => 'Química',
                'codigo' => 'ET122',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 3
            ],//54
            [
                'nombre' => 'Sistemas de Representación Gráfica',
                'codigo' => 'ET131',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 3
            ],//55
            [
                'nombre' => 'Ingeniería y Sociedad',
                'codigo' => 'ET161',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 3
            ],//56
            [
                'nombre' => 'Cálculo 2',
                'codigo' => 'ET211',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 3
            ],//57
            [
                'nombre' => 'Probabilidad y Estadística 1',
                'codigo' => 'ET213',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 3
            ],//58
            [
                'nombre' => 'Física 2',
                'codigo' => 'ET221',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 3
            ],//59
            [
                'nombre' => 'Informática',
                'codigo' => 'ET241',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 3
            ]//60

        ]);

        DB::table('equivalencia')->insert([
            ['asignatura_1' => 1, 'asignatura_2' => 26], // Algebra y Geometría Analítica / Algebra
            ['asignatura_1' => 1, 'asignatura_2' => 50], // Algebra y Geometría Analítica / Algebra
            ['asignatura_1' => 2, 'asignatura_2' => 27], // Cálculo 1 / Matemática 1
            ['asignatura_1' => 2, 'asignatura_2' => 51], // Cálculo 1 / Matemática 1
            ['asignatura_1' => 7, 'asignatura_2' => 32], // Cálculo 2 
            ['asignatura_1' => 7, 'asignatura_2' => 56], // Cálculo 2
        ]);

        DB::table('evento')->insert([
            [
                'fecha' => Carbon::create(2024, 6, 15),
                'turno_id' => 1,
                'observacion' => 'Evento de prueba 1',
                'actividad_id' => 1, // Asumiendo que estos IDs existen en la tabla actividad
                'asignatura_id' => 1, // Asumiendo que estos IDs existen en la tabla asignatura
            ],
            [
                'fecha' => Carbon::create(2024, 6, 16),
                'turno_id' => 1,
                'observacion' => 'Evento de prueba 2',
                'actividad_id' => 2, // Asumiendo que estos IDs existen en la tabla actividad
                'asignatura_id' => 2, // Asumiendo que estos IDs existen en la tabla asignatura
            ],
            [
                'fecha' => Carbon::create(2024, 6, 17),
                'turno_id' => 2,
                'observacion' => 'Evento de prueba 3',
                'actividad_id' => 3, // Asumiendo que estos IDs existen en la tabla actividad
                'asignatura_id' => 3, // Asumiendo que estos IDs existen en la tabla asignatura
            ],
        ]);
    }
}
