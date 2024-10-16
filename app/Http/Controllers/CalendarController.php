<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
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

            $etiquetas[] = [
                'title' => $evento->asignatura->nombre . '<br/>' . $evento->actividad->nombre,
                'asignatura' => $evento->asignatura->nombre,
                'start' => $evento->fecha,
                'color' => $color,
                'textColor' => '#ffffff',
                'responsable' => $evento->asignatura->responsable,
                'observacion' => $evento->observacion,
                'actividad' => $evento->actividad->nombre,
                'carrera' => $evento->asignatura->carrera->nombre
            ];
        }

        return view('welcome', ['etiquetas' => $etiquetas]);
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
