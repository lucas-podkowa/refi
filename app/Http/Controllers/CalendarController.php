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
                case 'Final':
                    $color = '#ff0000';
                    break;
                case 'Parcial':
                    $color = '#ffaa00';
                    break;
                default:
                    $color = '#00aaff';
                    break;
            }

            $etiquetas[] = [
                'title' => $evento->actividad->codigo . ' - ' . $evento->asignatura->codigo,
                'start' => $evento->fecha,
                'color' => $color,
                'textColor' => '#ffffff'
            ];
        }

        return view('refi-calendar', ['etiquetas' => $etiquetas]);
    }
}
