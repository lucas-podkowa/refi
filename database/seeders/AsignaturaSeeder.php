<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class AsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('asignatura')->insert([
            [
                'nombre' => 'Álgebra y Geometría Analítica',
                'codigo' => 'CI111',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 1
            ], //1
            [
                'nombre' => 'Cálculo 1',
                'codigo' => 'CI112',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 1
            ], //2
            [
                'nombre' => 'Física 1',
                'codigo' => 'CI121',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 1
            ], //3
            [
                'nombre' => 'Química',
                'codigo' => 'CI122',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 1
            ], //4
            [
                'nombre' => 'Sistemas de Representación Gráfica',
                'codigo' => 'CI131',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 1
            ], //5
            [
                'nombre' => 'Ingeniería y Sociedad',
                'codigo' => 'CI161',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 1
            ], //6
            [
                'nombre' => 'Cálculo 2',
                'codigo' => 'CI211',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 1
            ], //7
            [
                'nombre' => 'Física 2',
                'codigo' => 'CI221',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 1
            ], //8
            [
                'nombre' => 'Estática',
                'codigo' => 'CI251',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 1
            ], //9
            [
                'nombre' => 'Informática',
                'codigo' => 'CI241',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 1
            ], //10
            [
                'nombre' => 'Matemática Aplicada',
                'codigo' => 'CI212',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 1
            ], //11
            [
                'nombre' => 'Mecánica Racional',
                'codigo' => 'CI222',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 1
            ], //12
            [
                'nombre' => 'Resistencia de Materiales',
                'codigo' => 'CI252',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 1
            ], //13
            [
                'nombre' => 'Teoría de la Elasticidad',
                'codigo' => 'CI254',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 1
            ], //14
            [
                'nombre' => 'Ingeniería e Industrias',
                'codigo' => 'CI261',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 1
            ], //15
            [
                'nombre' => 'Probabilidad y Estadística 1',
                'codigo' => 'CI213',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 1
            ], //16
            [
                'nombre' => 'Mecánica de los Fluidos y Máquinas',
                'codigo' => 'CI332',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 1
            ], //17
            [
                'nombre' => 'Mecánica de los Suelos',
                'codigo' => 'CI351',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 1
            ], //18
            [
                'nombre' => 'Topografía',
                'codigo' => 'CI352',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 1
            ], //19
            [
                'nombre' => 'Caminos 1',
                'codigo' => 'CI353',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 1
            ], //20
            [
                'nombre' => 'Estructuras',
                'codigo' => 'CI354',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 1
            ], //21
            [
                'nombre' => 'Ciencia de los Materiales',
                'codigo' => 'CI355',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 1
            ], //22
            [
                'nombre' => 'Hidrología',
                'codigo' => 'CI356',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 1
            ], //23
            [
                'nombre' => 'Inglés 1',
                'codigo' => 'CI365',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 1
            ], //24
            [ //1º año ElectroMecanica
                'nombre' => 'Álgebra y Geometría Analítica',
                'codigo' => 'EM111',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 2
            ], //25
            [
                'nombre' => 'Cálculo 1',
                'codigo' => 'EM112',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 2
            ], //26
            [
                'nombre' => 'Física 1',
                'codigo' => 'EM121',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 2
            ], //27
            [
                'nombre' => 'Química',
                'codigo' => 'EM122',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 2
            ], //28
            [
                'nombre' => 'Sistemas de Representación Gráfica',
                'codigo' => 'EM131',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 2
            ], //29
            [
                'nombre' => 'Ingeniería y Sociedad',
                'codigo' => 'EM161',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 2
            ], //30
            [ //2º año ElectroMecanica
                'nombre' => 'Cálculo 2',
                'codigo' => 'EM211',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 2
            ], //31
            [
                'nombre' => 'Probabilidad y Estadística 1',
                'codigo' => 'EM213',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 2
            ], //32
            [
                'nombre' => 'Física 2',
                'codigo' => 'EM221',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 2
            ], //33
            [
                'nombre' => 'Informática',
                'codigo' => 'EM241',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 2
            ], //34
            [
                'nombre' => 'Matemática Aplicada',
                'codigo' => 'EM212',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 2
            ], //35
            [
                'nombre' => 'Mecánica Racional',
                'codigo' => 'EM222',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 2
            ], //36
            [
                'nombre' => 'Termodinámica',
                'codigo' => 'EM231',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 2
            ], //37
            [
                'nombre' => 'Estática y Resistencia de Materiales',
                'codigo' => 'EM253',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 2
            ], //38
            [
                'nombre' => 'Ingeniería e Industrias',
                'codigo' => 'EM261',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 2
            ], //39
            [
                'nombre' => 'Electrotécnia',
                'codigo' => 'EM331',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 2
            ], //40
            [
                'nombre' => 'Mecánica de los Fluidos y Máquinas',
                'codigo' => 'EM332',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 2
            ], //41
            [
                'nombre' => 'Diseño Aplicado',
                'codigo' => 'EM333',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 2
            ], //42
            [
                'nombre' => 'Máquinas e Instalaciones Térmicas 1',
                'codigo' => 'EM334',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 2
            ], //43
            [
                'nombre' => 'Electrónica',
                'codigo' => 'EM341',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 2
            ], //44
            [
                'nombre' => 'Ciencia de los Materiales',
                'codigo' => 'EM335',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 2
            ], //45
            [
                'nombre' => 'Mediciones y Metrología',
                'codigo' => 'EM336',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 2
            ], //46
            [
                'nombre' => 'Máquinas Eléctricas',
                'codigo' => 'EM337',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 2
            ], //47
            [
                'nombre' => 'Higiene, Seguridad y Medio Ambiente',
                'codigo' => 'EM466',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 2
            ], //48
            [ //1º año Ingeniería Electronica
                'nombre' => 'Álgebra y Geometría Analítica',
                'codigo' => 'ET111',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 3
            ], //49
            [
                'nombre' => 'Cálculo 1',
                'codigo' => 'ET112',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 3
            ], //50
            [
                'nombre' => 'Física 1',
                'codigo' => 'ET121',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 3
            ], //51
            [
                'nombre' => 'Química',
                'codigo' => 'ET122',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 3
            ], //52
            [
                'nombre' => 'Sistemas de Representación Gráfica',
                'codigo' => 'ET131',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 3
            ], //53
            [
                'nombre' => 'Ingeniería y Sociedad',
                'codigo' => 'ET161',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 3
            ], //54
            [
                'nombre' => 'Cálculo 2',
                'codigo' => 'ET211',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 3
            ], //55
            [
                'nombre' => 'Probabilidad y Estadística 1',
                'codigo' => 'ET213',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 3
            ], //56
            [
                'nombre' => 'Física 2',
                'codigo' => 'ET221',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 3
            ], //57
            [
                'nombre' => 'Informática',
                'codigo' => 'ET241',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 3
            ], //58
            [
                'nombre' => 'Matemática Aplicada',
                'codigo' => 'ET212',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 3
            ], //59
            [
                'nombre' => 'Tecnología Electrónica',
                'codigo' => 'ET242',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 3
            ], //60
            [
                'nombre' => 'Física 3',
                'codigo' => 'ET243',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 3
            ], //61
            [
                'nombre' => 'Ingeniería e Industrias',
                'codigo' => 'ET261',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 3
            ], //62
            [ //3° año Ingeniería Electrónica
                'nombre' => 'Análisis de Circuitos',
                'codigo' => 'ET342',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 3
            ], //63
            [
                'nombre' => 'Señales y Sistemas',
                'codigo' => 'ET343',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 3
            ], //64
            [
                'nombre' => 'Computación',
                'codigo' => 'ET344',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 3
            ], //65
            [
                'nombre' => 'Dispositivos Electrónicos',
                'codigo' => 'ET345',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 3
            ], //66
            [
                'nombre' => 'Máquinas e Instalaciones Eléctricas',
                'codigo' => 'ET339',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 3
            ], //67
            [
                'nombre' => 'Electromagnetismo',
                'codigo' => 'ET346',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 3
            ], //68
            [
                'nombre' => 'Electrónica Analógica',
                'codigo' => 'ET347',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 3
            ], //69
            [
                'nombre' => 'Inglés 1',
                'codigo' => 'ET365',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 3
            ], //70
            [ //Ingeniería Industrial
                'nombre' => 'Álgebra y Geometría Analítica',
                'codigo' => 'IN111',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 4
            ], //71
            [
                'nombre' => 'Cálculo 1',
                'codigo' => 'IN112',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 4
            ], //72
            [
                'nombre' => 'Física 1',
                'codigo' => 'IN121',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 4
            ], //73
            [
                'nombre' => 'Química',
                'codigo' => 'IN122',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 4
            ], //74
            [
                'nombre' => 'Sistemas de Representación Gráfica',
                'codigo' => 'IN131',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 4
            ], //75
            [
                'nombre' => 'Ingeniería y Sociedad',
                'codigo' => 'IN161',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 4
            ], //76
            [
                'nombre' => 'Cálculo 2',
                'codigo' => 'IN211',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 4
            ], //77
            [
                'nombre' => 'Probabilidad y Estadística 1',
                'codigo' => 'IN213',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 4
            ], //78
            [
                'nombre' => 'Física 2',
                'codigo' => 'IN221',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 4
            ], //79
            [
                'nombre' => 'Informática',
                'codigo' => 'IN241',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 4
            ], //80
            [
                'nombre' => 'Matemática Aplicada',
                'codigo' => 'IN212',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 4
            ], //81
            [
                'nombre' => 'Mecánica Racional',
                'codigo' => 'IN222',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 4
            ], //82
            [
                'nombre' => 'Termodinámica',
                'codigo' => 'IN231',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 4
            ], //83
            [
                'nombre' => 'Estática y Resistencia de Materiales',
                'codigo' => 'IN253',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 4
            ], //84
            [
                'nombre' => 'Ingeniería e Industrias',
                'codigo' => 'IN261',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 4
            ], //85
            [
                'nombre' => 'Mecánica de los Fluidos y Máquinas',
                'codigo' => 'IN332',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 4
            ], //86
            [
                'nombre' => 'Electrotécnia y Máquinas Eléctricas',
                'codigo' => 'IN338',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 4
            ], //87
            [
                'nombre' => 'Electrónica',
                'codigo' => 'IN341',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 4
            ], //88
            [
                'nombre' => 'Sistemas de Producción',
                'codigo' => 'IN363',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 4
            ], //89
            [
                'nombre' => 'Probabilidad y Estadística 2',
                'codigo' => 'IN362',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 4
            ], //90
            [
                'nombre' => 'Ciencia de los Materiales',
                'codigo' => 'IN335',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 4
            ], //91
            [
                'nombre' => 'Ingeniería Económica',
                'codigo' => 'IN361',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 4
            ], //92
            [
                'nombre' => 'Costos Industriales',
                'codigo' => 'IN364',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 4
            ], //93
            [
                'nombre' => 'Inglés 1',
                'codigo' => 'IN365',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 4
            ], //94                      
            [ //--------Ingeniería en Computación
                'nombre' => 'Matemática 1',
                'codigo' => 'IC101',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 5
            ], //95
            [
                'nombre' => 'Álgebra',
                'codigo' => 'IC102',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 5
            ], //96
            [
                'nombre' => 'Algoritmos y Estructuras de Datos',
                'codigo' => 'IC103',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 5
            ], //97
            [
                'nombre' => 'Fundamentos de Informática',
                'codigo' => 'IC111',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 5
            ], //98
            [
                'nombre' => 'Inglés Técnico 1',
                'codigo' => 'IC112',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 5
            ], //99
            [
                'nombre' => 'Sistemas de Representación',
                'codigo' => 'IC121',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 5
            ], //100
            [
                'nombre' => 'Química',
                'codigo' => 'IC122',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 5
            ], //101
            [
                'nombre' => 'Matemática 2',
                'codigo' => 'IC211',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 5
            ], //102
            [
                'nombre' => 'Física Mecánica',
                'codigo' => 'IC212',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 5
            ], //103
            [
                'nombre' => 'Fundamentos de Computación 1',
                'codigo' => 'IC213',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 5
            ], //104
            [
                'nombre' => 'Arquitectura de Computadoras',
                'codigo' => 'IC221',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 5
            ], //105
            [
                'nombre' => 'Matemática 3',
                'codigo' => 'IC222',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 5
            ], //106
            [
                'nombre' => 'Electricidad y Electromagnetismo',
                'codigo' => 'IC223',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 5
            ], //107
            [
                'nombre' => 'Programación',
                'codigo' => 'IC224',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 5
            ], //108
            [
                'nombre' => 'Probabilidad y Estadística',
                'codigo' => 'IC311',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 5
            ], //109
            [
                'nombre' => 'Circuitos Eléctricos',
                'codigo' => 'IC312',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 5
            ], //110
            [
                'nombre' => 'Materiales y Dispositivos Electrónicos',
                'codigo' => 'IC313',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 5
            ], //111
            [
                'nombre' => 'Organización Empresarial',
                'codigo' => 'IC314',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 5
            ], //112
            [
                'nombre' => 'Sistemas Operativos',
                'codigo' => 'IC315',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 5
            ], //113
            [
                'nombre' => 'Electrónica Analógica',
                'codigo' => 'IC321',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 5
            ], //114
            [
                'nombre' => 'Fundamentos de Computación 2',
                'codigo' => 'IC322',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 5
            ], //115
            [
                'nombre' => 'Comunicación de Datos',
                'codigo' => 'IC323',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 5
            ], //116
            [
                'nombre' => 'Señales y Sistemas',
                'codigo' => 'IC324',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 5
            ], //117
            [ //------Ingeniería Mecatrónica
                'nombre' => 'Álgebra y Geometría Analítica',
                'codigo' => 'IM101',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 6
            ], //118
            [
                'nombre' => 'Cálculo 1',
                'codigo' => 'IM102',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 6
            ], //119
            [
                'nombre' => 'Física 1',
                'codigo' => 'IM103',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 6
            ], //120
            [
                'nombre' => 'Ingeniería y Sociedad',
                'codigo' => 'IM104',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 6
            ], //121
            [
                'nombre' => 'Sistemas de Representación Gráfica',
                'codigo' => 'IM105',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 6
            ], //122
            [
                'nombre' => 'Química',
                'codigo' => 'IM106',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 6
            ], //123
            [
                'nombre' => 'Cálculo 2',
                'codigo' => 'IM201',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 6
            ], //124
            [
                'nombre' => 'Estadística Técnica',
                'codigo' => 'IM202',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 6
            ], //125
            [
                'nombre' => 'Física 2',
                'codigo' => 'IM203',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 6
            ], //126
            [
                'nombre' => 'Informática',
                'codigo' => 'IM204',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 6
            ], //127
            [
                'nombre' => 'Introducción a la Tecnología Mecatrónica',
                'codigo' => 'IM205',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 6
            ], //128
            [
                'nombre' => 'Matemática Aplicada',
                'codigo' => 'IM206',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 6
            ], //129
            [
                'nombre' => 'Termodinámica',
                'codigo' => 'IM207',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 6
            ], //130
            [
                'nombre' => 'Estática y Resistencia de Materiales',
                'codigo' => 'IM208',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 6
            ], //131
            [
                'nombre' => 'Electrotecnia',
                'codigo' => 'IM301',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 6
            ], //132
            [
                'nombre' => 'Mecánica de Fluidos y Máquinas',
                'codigo' => 'IM302',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 6
            ], //133
            [
                'nombre' => 'Diseño Aplicado',
                'codigo' => 'IM303',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 6
            ], //134
            [
                'nombre' => 'Tecnología y Selección de Materiales',
                'codigo' => 'IM304',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 6
            ], //135
            [
                'nombre' => 'Actuadores Electromagnéticos',
                'codigo' => 'IM305',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 6
            ], //136
            [
                'nombre' => 'Sistemas Digitales',
                'codigo' => 'IM306',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 6
            ], //137
            [
                'nombre' => 'Electrónica Analógica',
                'codigo' => 'IM307',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 6
            ], //138
            [
                'nombre' => 'Ingeniería e Industrias',
                'codigo' => 'IM308',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 6
            ], //139
            [
                'nombre' => 'Mecánica Racional',
                'codigo' => 'IM309',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 6
            ], //140
            [
                'nombre' => 'Álgebra y Geometría Analítica',
                'codigo' => '111',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 7
            ], //141
            [
                'nombre' => 'Cálculo 1',
                'codigo' => '112',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 7
            ], //142
            [
                'nombre' => 'Física 1',
                'codigo' => '113',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 7
            ], //143
            [
                'nombre' => 'Química',
                'codigo' => '213',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 7
            ], //144
            [
                'nombre' => 'Taller de Inglés 1',
                'codigo' => '011',
                'ciclo' => 1,
                'responsable' => null,
                'dictado_id' => 1,
                'carrera_id' => 7
            ], //145
            [
                'nombre' => 'HST I - Introducción',
                'codigo' => '700',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 7
            ], //146
            [
                'nombre' => 'HST II - Derecho del Trabajo',
                'codigo' => '701',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 7
            ], //147
            [
                'nombre' => 'HST III - Medicina del Trabajo',
                'codigo' => '702',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 7
            ], //148
            [
                'nombre' => 'HST IV - Establecimientos',
                'codigo' => '703',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 7
            ], //149
            [
                'nombre' => 'HST V - Carga Térmica',
                'codigo' => '704',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 7
            ], //150
            [
                'nombre' => 'HST VI - Contaminación Química',
                'codigo' => '705',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 7
            ], //151
            [
                'nombre' => 'HST VII - Radiaciones',
                'codigo' => '706',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 7
            ], //152
            [
                'nombre' => 'HST VIII - Soldadura',
                'codigo' => '707',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 7
            ], //153
            [
                'nombre' => 'HST IX - Iluminación y Color',
                'codigo' => '708',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 7
            ], //154
            [
                'nombre' => 'HST X - Ruido',
                'codigo' => '709',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 7
            ], //155
            [
                'nombre' => 'HST XI - Electricidad',
                'codigo' => '710',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 7
            ], //156
            [
                'nombre' => 'HST XII - Máquinas y Herramientas',
                'codigo' => '711',
                'ciclo' => 2,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 7
            ], //157
            [
                'nombre' => 'HST XII - Fuego',
                'codigo' => '712',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 7
            ], //158
            [
                'nombre' => 'HST XIV - Elementos de Protección Personal',
                'codigo' => '713',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 7
            ], //159
            [
                'nombre' => 'HST XV - Selección y Capacitación de Personal',
                'codigo' => '714',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 7
            ], //160
            [
                'nombre' => 'HST XVI - Costos e Indicadores',
                'codigo' => '715',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 7
            ], //161
            [
                'nombre' => 'HST XVII - Ergonomía',
                'codigo' => '716',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 7
            ], //162
            [
                'nombre' => 'HST XVIII - Trabajos Rurales',
                'codigo' => '717',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 2,
                'carrera_id' => 7
            ], //163
            [
                'nombre' => 'Metodología de la Investigación',
                'codigo' => '718',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 7
            ], //164
            [
                'nombre' => 'Termodinámica y Máquinas',
                'codigo' => '222',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 7
            ], //165
            [
                'nombre' => 'Economía y Organización de la Producción',
                'codigo' => '451',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 7
            ], //166
            [
                'nombre' => 'Probabilidad y Estadística',
                'codigo' => '219',
                'ciclo' => 3,
                'responsable' => null,
                'dictado_id' => 3,
                'carrera_id' => 7
            ] //167
        ]);



        // DB::table('evento')->insert([
        //     [
        //         'fecha' => Carbon::create(2024, 9, 15),
        //         'turno_id' => 1,
        //         'observacion' => 'Evento de prueba 1',
        //         'actividad_id' => 1, // Asumiendo que estos IDs existen en la tabla actividad
        //         'asignatura_id' => 1, // Asumiendo que estos IDs existen en la tabla asignatura
        //     ],
        //     [
        //         'fecha' => Carbon::create(2024, 9, 16),
        //         'turno_id' => 1,
        //         'observacion' => 'Evento de prueba 2',
        //         'actividad_id' => 2, // Asumiendo que estos IDs existen en la tabla actividad
        //         'asignatura_id' => 2, // Asumiendo que estos IDs existen en la tabla asignatura
        //     ],
        //     [
        //         'fecha' => Carbon::create(2024, 9, 20),
        //         'turno_id' => 2,
        //         'observacion' => 'Evento de prueba 3',
        //         'actividad_id' => 3, // Asumiendo que estos IDs existen en la tabla actividad
        //         'asignatura_id' => 3, // Asumiendo que estos IDs existen en la tabla asignatura
        //     ],
        // ]);
    }
}
