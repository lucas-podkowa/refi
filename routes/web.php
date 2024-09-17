<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DashboardController;
use App\Livewire\ShowAsignatura;
use App\Livewire\ShowCarrera;
use App\Livewire\ShowEquivalencia;
use App\Livewire\ShowEvento;


Route::get('/', [CalendarController::class, 'index'])->name('welcome');
Route::get('asignatura', ShowAsignatura::class)->middleware('can:asignaturas')->name('asignaturas');
Route::get('evento', ShowEvento::class)->middleware('can:eventos')->name('eventos');
Route::get('carrera', ShowCarrera::class)->middleware('can:carreras')->name('carreras');
Route::get('dictados_comunes', ShowEquivalencia::class)->middleware('can:dictadosComunes')->name('dictadosComunes');

Route::get('/get-events-by-date', [CalendarController::class, 'getEventsByDate']);

Route::middleware(['auth:sanctum',    config('jetstream.auth_session'),    'verified',])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
