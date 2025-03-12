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


    // public function index()
    // {
    //     // Obtener ciclos únicos desde la base de datos
    //     //$ciclos = Evento::pluck('ciclo')->unique()->sort();
    //     $ciclos = Evento::with('asignatura')
    //         ->get()
    //         ->pluck('asignatura.ciclo')
    //         ->unique()
    //         ->sort();

    //     //            $this->ciclos = Asignatura::distinct()->pluck('ciclo')->toArray();



    //     // Obtener todos los eventos por defecto
    //     $etiquetas = $this->formatearEventos(Evento::all());

    //     return view('welcome', ['etiquetas' => $etiquetas, 'ciclos' => $ciclos]);
    // }

    public function getEventsByCiclo(Request $request)
    {
        $ciclo = $request->input('ciclo');

        // Si no se selecciona un ciclo, obtener todos los eventos
        $eventos = $ciclo ? Evento::where('ciclo', $ciclo)->get() : Evento::all();

        return response()->json($this->formatearEventos($eventos));
    }

    private function formatearEventos($eventos)
    {
        $etiquetas = array();
        $eventos = Evento::all();
        foreach ($eventos as $evento) {
            $color = null;
            switch ($evento->actividad->codigo) {
                case 'EF':
                    $color = '#ff0000';
                    break;
                case 'EP':
                    $color = '#ffaa00';
                    break;
                default:
                    $color = '#00aaff';
                    break;
            }

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
                'title' => $asignatura->nombre . '<br/>' . $evento->actividad->nombre,
                'asignatura' => $asignaturasList,
                'start' => $evento->fecha,
                'color' => $color,
                'textColor' => '#ffffff',
                'responsable' => $asignatura->responsable,
                'observacion' => $evento->observacion,
                'actividad' => $evento->actividad->nombre,
                'dictado_comun' => $dictadoComunList,
                'ciclo' => $evento->asignatura->ciclo
            ];
        }
        return $etiquetas;
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
