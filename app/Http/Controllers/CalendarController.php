<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class CalendarController extends Controller
{

    public function index()
    {
        // Obtener ciclos únicos desde la base de datos
        $ciclos = Evento::with('asignatura')
            ->get()
            ->pluck('asignatura.ciclo')
            ->unique()
            ->sort();

        // Obtener carreras con eventos (directos o por dictado común)
        $carreras = Evento::with('asignatura.carrera', 'asignatura.dictadosComunes.carrera')
            ->get()
            ->flatMap(function ($evento) {
                $carreras = collect([$evento->asignatura->carrera->nombre]);

                // Agregar dictados comunes
                foreach ($evento->asignatura->dictadosComunes as $dictado) {
                    $carreras->push($dictado->carrera->nombre);
                }
                return $carreras;
            })
            ->unique()
            ->sort();

        // Obtener todos los eventos por defecto
        $etiquetas = $this->formatearEventos(Evento::all());

        return view('welcome', ['etiquetas' => $etiquetas, 'ciclos' => $ciclos, 'carreras' => $carreras]);
    }

    public function getEventsByCiclo(Request $request)
    {
        $ciclo = $request->input('ciclo');

        // Si no se selecciona un ciclo, obtener todos los eventos
        $eventos = $ciclo ? Evento::where('ciclo', $ciclo)->get() : Evento::all();

        return response()->json($this->formatearEventos($eventos));
    }

    // private function formatearEventos($eventos)
    // {
    //     $etiquetas = array();
    //     $eventos = Evento::all();
    //     foreach ($eventos as $evento) {

    //         // Obtener todas las asignaturas relacionadas con dictados comunes
    //         $asignatura = $evento->asignatura;
    //         $asignaturasNombres = collect([$asignatura->nombre]);

    //         $dictadoComunInfo = collect([
    //             $asignatura->carrera->nombre . ' (' . $asignatura->codigo . ')'
    //         ]);

    //         // Obtener asignaturas de dictados comunes
    //         $dictadosComunes = $asignatura->dictadosComunes->merge($asignatura->dictadosComunesInversos);


    //         // Agregar las carreras y códigos de dictado común con formato "Nombre de la carrera (Código de la asignatura)"
    //         foreach ($dictadosComunes as $dictado) {
    //             $dictadoComunInfo->push($dictado->carrera->nombre . ' (' . $dictado->codigo . ')');
    //             $asignaturasNombres->push($dictado->nombre);
    //         }

    //         // Eliminar duplicados
    //         $dictadoComunList = $dictadoComunInfo->unique()->implode(', ');
    //         $asignaturasList = $asignaturasNombres->unique()->implode(', ');

    //         $etiquetas[] = [
    //             'title' => $asignatura->nombre . '<br/>' . $evento->actividad->nombre,
    //             'title_short' => $asignatura->nombre . ' (' . $evento->actividad->nombre . ')',
    //             'asignatura' => $asignaturasList,
    //             'start' => $evento->fecha,
    //             'color' => '#00aaff',
    //             'textColor' => '#ffffff',
    //             'responsable' => $asignatura->responsable,
    //             'observacion' => $evento->observacion,
    //             'actividad' => $evento->actividad->nombre,
    //             'dictado_comun' => $dictadoComunList,
    //             'ciclo' => $evento->asignatura->ciclo
    //         ];
    //     }
    //     return $etiquetas;
    // }
    private function formatearEventos($eventos)
    {
        $agrupadosPorFecha = [];

        foreach ($eventos as $evento) {
            $fecha = $evento->fecha;

            // Armar info base
            $asignatura = $evento->asignatura;
            $nombreAsignatura = $asignatura->nombre;
            $actividad = $evento->actividad->nombre;

            $dictadosComunes = $asignatura->dictadosComunes->merge($asignatura->dictadosComunesInversos);
            $asignaturasNombres = collect([$nombreAsignatura]);
            $dictadoComunInfo = collect([$asignatura->carrera->nombre . ' (' . $asignatura->codigo . ')']);

            foreach ($dictadosComunes as $dictado) {
                $dictadoComunInfo->push($dictado->carrera->nombre . ' (' . $dictado->codigo . ')');
                $asignaturasNombres->push($dictado->nombre);
            }

            $etiqueta = [
                'title' => $nombreAsignatura . '<br/>' . $actividad,
                'title_short' => $nombreAsignatura . ' (' . $actividad . ')',
                'asignatura' => $asignaturasNombres->unique()->implode(', '),
                'start' => $fecha,
                'color' => '#00aaff',
                'textColor' => '#ffffff',
                'responsable' => $asignatura->responsable,
                'observacion' => $evento->observacion,
                'actividad' => $actividad,
                'dictado_comun' => $dictadoComunInfo->unique()->implode(', '),
                'ciclo' => $asignatura->ciclo
            ];

            $agrupadosPorFecha[$fecha][] = $etiqueta;
        }

        // Ahora ajustamos los títulos según la cantidad de eventos por fecha
        $final = [];
        foreach ($agrupadosPorFecha as $fecha => $eventosDelDia) {
            $usarTituloCorto = count($eventosDelDia) > 2;

            foreach ($eventosDelDia as &$evento) {
                $evento['title'] = $usarTituloCorto ? $evento['title_short'] : $evento['title'];
                unset($evento['title_short']); // ya no lo necesitamos
                $final[] = $evento;
            }
        }

        return $final;
    }


    public function getEventsByDate(Request $request)
    {
        // Valida la fecha
        $request->validate([
            'fecha' => 'required|date',
        ]);

        // Obtén los eventos que coincidan con la fecha seleccionada
        $eventos = Evento::whereDate('fecha', $request->fecha)->get();

        // Devuelve los eventos como respuesta JSON
        return response()->json($eventos);
    }
}
