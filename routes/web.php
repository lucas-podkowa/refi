<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalendarioController;
use App\Livewire\ShowAsignatura;
use App\Livewire\ShowCarrera;
use App\Livewire\ShowEquivalencia;
use App\Livewire\ShowEvento;

Route::get('/', HomeController::class);
Route::get('asignatura', ShowAsignatura::class)->name('asignaturas');
Route::get('evento', ShowEvento::class)->name('eventos');
Route::get('carrera', ShowCarrera::class)->name('carreras');
Route::get('equivalencia', ShowEquivalencia::class)->name('equivalencias');



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


// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
