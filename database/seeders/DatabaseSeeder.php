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
            ],//60
            [
                'nombre' => 'Matemática Aplicada',
                'codigo' => 'ET212',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 3
            ],//61
            [
                'nombre' => 'Tecnología Electrónica',
                'codigo' => 'ET242',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 3
            ],//62
            [
                'nombre' => 'Física 3',
                'codigo' => 'ET243',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 3
            ],//63
            [
                'nombre' => 'Ingeniería e Industrias',
                'codigo' => 'ET261',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 3
            ],//64
            [//3° año Ingeniería Electrónica
                'nombre' => 'Análisis de Circuitos',
                'codigo' => 'ET342',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 3
            ],//65
            [
                'nombre' => 'Señales y Sistemas',
                'codigo' => 'ET343',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 3
            ],//66
            [
                'nombre' => 'Computación',
                'codigo' => 'ET344',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 3
            ],//67
            [
                'nombre' => 'Dispositivos Electrónicos',
                'codigo' => 'ET345',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 3
            ],//68
            [
                'nombre' => 'Máquinas e Instalaciones Eléctricas',
                'codigo' => 'ET339',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 3
            ],//69
            [
                'nombre' => 'Electromagnetismo',
                'codigo' => 'ET346',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 3
            ],//70
            [
                'nombre' => 'Electrónica Analógica',
                'codigo' => 'ET347',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 3
            ],//71
            [
                'nombre' => 'Inglés 1',
                'codigo' => 'ET365',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 3
            ],//72
            [//Ingeniería Industrial
                'nombre' => 'Álgebra y Geometría Analítica',
                'codigo' => 'IN111',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 4
            ],//73
            [
                'nombre' => 'Cálculo 1',
                'codigo' => 'IN112',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 4
            ],//74
            [
                'nombre' => 'Física 1',
                'codigo' => 'IN121',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 4
            ],//75
            [
                'nombre' => 'Química',
                'codigo' => 'IN122',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 4
            ],//76
            [
                'nombre' => 'Sistemas de Representación Gráfica',
                'codigo' => 'IN131',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 4
            ],//77
            [
                'nombre' => 'Ingeniería y Sociedad',
                'codigo' => 'IN161',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 4
            ],78
            [
                'nombre' => 'Cálculo 2',
                'codigo' => 'IN211',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 4
            ],//79
            [
                'nombre' => 'Probabilidad y Estadística 1',
                'codigo' => 'IN213',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 4
            ],//80
            [
                'nombre' => 'Física 2',
                'codigo' => 'IN221',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 4
            ],//81
            [
                'nombre' => 'Informática',
                'codigo' => 'IN241',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 4
            ],//82
            [
                'nombre' => 'Matemática Aplicada',
                'codigo' => 'IN212',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 4
            ],//83
            [
                'nombre' => 'Mecánica Racional',
                'codigo' => 'IN222',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 4
            ],//84
            [
                'nombre' => 'Termodinámica',
                'codigo' => 'IN231',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 4
            ],//85
            [
                'nombre' => 'Estática y Resistencia de Materiales',
                'codigo' => 'IN253',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 4
            ],//
            [
                'nombre' => 'Ingeniería e Industrias',
                'codigo' => 'IN261',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 4
            ],//
            [
                'nombre' => 'Mecánica de los Fluidos y Máquinas',
                'codigo' => 'IN332',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 4
            ],//
            [
                'nombre' => 'Electrotécnia y Máquinas Eléctricas',
                'codigo' => 'IN338',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 4
            ],//
            [
                'nombre' => 'Electrónica',
                'codigo' => 'IN341',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 4
            ],//
            [
                'nombre' => 'Sistemas de Producción',
                'codigo' => 'IN363',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 4
            ],//
            [
                'nombre' => 'Probabilidad y Estadística 2',
                'codigo' => 'IN362',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 4
            ],//
            [
                'nombre' => 'Ciencia de los Materiales',
                'codigo' => 'IN335',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 4
            ],//
            [
                'nombre' => 'Ingeniería Económica',
                'codigo' => 'IN361',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 4
            ],//
            [
                'nombre' => 'Matemática 1',
                'codigo' => 'IC101',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 5
            ],//
            [
                'nombre' => 'Álgebra',
                'codigo' => 'IC102',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 5
            ],//
            [
                'nombre' => 'Algoritmos y Estructuras de Datos',
                'codigo' => 'IC103',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 5
            ],//
            [
                'nombre' => 'Fundamentos de Informática',
                'codigo' => 'IC111',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 5
            ],//
            [
                'nombre' => 'Inglés Técnico 1',
                'codigo' => 'IC112',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 5
            ],//
            [
                'nombre' => 'Sistemas de Representación',
                'codigo' => 'IC121',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 5
            ],//
            [
                'nombre' => 'Química',
                'codigo' => 'IC122',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 5
            ],//
            [
                'nombre' => 'Matemática 2',
                'codigo' => 'IC211',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 5
            ],//
            [
                'nombre' => 'Física Mecánica',
                'codigo' => 'IC212',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 5
            ],//
            [
                'nombre' => 'Fundamentos de Computación 1',
                'codigo' => 'IC213',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 5
            ],//
            [
                'nombre' => 'Arquitectura de Computadoras',
                'codigo' => 'IC221',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 5
            ],//
            [
                'nombre' => 'Matemática 3',
                'codigo' => 'IC222',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 5
            ],//
            [
                'nombre' => '',
                'codigo' => 'IC',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 5
            ],//
            [
                'nombre' => '',
                'codigo' => 'IC',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 5
            ],//
            [
                'nombre' => '',
                'codigo' => 'IC',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 5
            ],//
            [
                'nombre' => '',
                'codigo' => 'IC',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 5
            ],//
            [
                'nombre' => '',
                'codigo' => 'IC',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 5
            ],//
            [
                'nombre' => '',
                'codigo' => 'IC',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 5
            ],//
            [
                'nombre' => '',
                'codigo' => 'IC',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 5
            ]
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
