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
                'title' => $evento->asignatura->nombre,
                'start' => $evento->fecha,
                'color' => $color,
                'textColor' => '#ffffff',
                'responsable' => $evento->asignatura->responsable,
                'observacion' => $evento->observacion
            ];
        }
        return view('dashboard', ['etiquetas' => $etiquetas]);
    }
}