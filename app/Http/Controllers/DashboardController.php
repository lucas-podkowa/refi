<?php

namespace App\Http\Controllers;

use App\Models\Evento;

class DashboardController extends Controller
{
    public function index()
    {

        $etiquetas = array();
        $eventos = Evento::all();

        foreach ($eventos as $evento) {

            // Obtener todas las asignaturas relacionadas con dictados comunes
            $asignatura = $evento->asignatura;
            $asignaturasNombres = collect([$asignatura->nombre]);

            $dictadoComunInfo = collect([
                $asignatura->carrera->nombre . ' (' . $asignatura->codigo . ')'
            ]);

            // Obtener asignaturas de dictados comunes
            $dictadosComunes = $asignatura->dictadosComunes->merge($asignatura->dictadosComunesInversos);


            // Agregar las carreras y códigos de dictado común con formato "Nombre de la carrera (Código de la asignatura)"
            foreach ($dictadosComunes as $dictado) {
                $dictadoComunInfo->push($dictado->carrera->nombre . ' (' . $dictado->codigo . ')');
                $asignaturasNombres->push($dictado->nombre);
            }

            // Eliminar duplicados
            $dictadoComunList = $dictadoComunInfo->unique()->implode(', ');
            $asignaturasList = $asignaturasNombres->unique()->implode(', ');

            $etiquetas[] = [
                'title' => $asignatura->nombre . ' (' . $evento->actividad->nombre . ')',
                'asignatura' => $asignaturasList,
                'start' => $evento->fecha,
                'color' => '#00aaff',
                'textColor' => '#ffffff',
                'observacion' => $evento->observacion,
                'actividad' => $evento->actividad->nombre,
                'dictado_comun' => $dictadoComunList,
                'ciclo' => $evento->asignatura->ciclo
            ];
        }
        // foreach ($eventos as $evento) {

        //     $etiquetas[] = [
        //         'title' => $evento->asignatura->nombre,
        //         'start' => $evento->fecha,
        //         'color' => $color,
        //         'textColor' => '#ffffff',
        //         'responsable' => $evento->asignatura->responsable,
        //         'observacion' => $evento->observacion

        //    ];
        // }
        return view('dashboard', ['etiquetas' => $etiquetas]);
    }
}
