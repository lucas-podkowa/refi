<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalendarioController;
use App\Livewire\ShowAsignatura;
use App\Livewire\ShowCarrera;
use App\Livewire\ShowEquivalencia;
use App\Livewire\ShowEvento;
use App\Models\Evento;

//calendar route

Route::get('/', [CalendarController::class, 'index'])->name('welcome');
Route::get('/get-events-by-date', [CalendarController::class, 'getEventsByDate']);

// Route::get('/', function () {
//     return view('welcome');
// });
//--------------

Route::get('asignatura', ShowAsignatura::class)->middleware('can:asignaturas')->name('asignaturas');
Route::get('evento', ShowEvento::class)->middleware('can:eventos')->name('eventos');
Route::get('carrera', ShowCarrera::class)->middleware('can:carreras')->name('carreras');
Route::get('dictados_comunes', ShowEquivalencia::class)->middleware('can:dictadosComunes')->name('dictadosComunes');




//Route::get('carrera/{codigo}', ShowCarrera::class);


// Route::controller(ActividadController::class)->group(function () {
//     Route::get('actividades', 'index');
//     Route::get('actividades/create', 'create');
//     Route::get('actividades/{actividad}', 'show');
// });

// Route::controller(CarreraController::class)->group(function () {
//     Route::get('carrera', 'index')->name('carrera.index');
//     Route::get('carrera/create', 'create');
//     Route::get('carrera/{carrera}', 'show');
//     Route::post('carrera', 'store')->name('carrera.store');;
// });

// Route::controller(RegistroController::class)->group(function () {
//     Route::get('registros', 'index');
// });



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {

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
        return view('dashboard', ['etiquetas' => $etiquetas]);
    })->name('dashboard');
});
