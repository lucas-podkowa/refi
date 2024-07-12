<?php

namespace App\Livewire;

use App\Models\Actividad;
use App\Models\Asignatura;
use App\Models\Carrera;
use App\Models\Evento;
use App\Models\Turno;
use Carbon\Carbon;
use DateTime;
use Livewire\Component;

class CreateEvento extends Component
{
    public $open = false; //sirve para que el modal no se visualice al renderizar el componente
    public $actividades = [];
    public $carreras = [];
    public $turnos = [];
    public $ciclos;
    public $asignaturas = [];
    public $carrera_id = null;
    public $asignatura_id = null;
    public $selectedCiclo = null;
    public $actividad_id;
    public $turno_id;
    public $fecha;
    public $hora_inicio;
    public $hora_fin;
    public $observacion;


    public function mount()
    {
        $this->actividades = Actividad::all();
        $this->carreras = Carrera::all();
        $this->turnos = Turno::all();
        $this->ciclos = collect();
        $this->asignaturas = collect();
    }

    protected $rules = [
        'fecha' => 'required|date',
        'observacion' => 'nullable|string',
        'actividad_id' => 'required|integer',
        'asignatura_id' => 'required|integer',
    ];


    public function updatedCarreraId($carrera_id)
    {
        $this->ciclos = Asignatura::distinct()->pluck('ciclo')->toArray();
        $this->selectedCiclo = null;
    }

    public function updatedSelectedCiclo($selectedCiclo)
    {
        $this->asignaturas = Asignatura::where('carrera_id', $this->carrera_id)
            ->where('ciclo', $selectedCiclo)->get();
    }

    public function save()
    {
        $this->validate();


        // Obtener las equivalencias de la asignatura y luego añadir la propia asignatura al array de equivalencias
        $asignatura = Asignatura::find($this->asignatura_id);
        $equivalencias = $asignatura->equivalencias->pluck('id')->toArray();
        $equivalencias[] = (int) $this->asignatura_id;

       
        // Comprobar si existe un evento en la misma fecha para la asignatura o sus equivalencias
        $eventoFecha = Evento::where('fecha', Carbon::parse($this->fecha))
            ->whereIn('asignatura_id', $equivalencias)
            ->first();

        if ($eventoFecha) {
            $this->dispatch('oops', message: 'Existen equivalencias');
            return;
        }

                
        // Comprobar si existe un evento en el mismo turno para otras asignaturas del mismo ciclo
        $ciclo = $asignatura->ciclo;
        $eventoMismoCiclo = Evento::where('turno_id', $this->turno_id)
            ->where('fecha', Carbon::parse($this->fecha))
            ->whereHas('asignatura', function ($query) use ($ciclo) {
                $query->where('ciclo', $ciclo);
            })
            ->first();

        if ($eventoMismoCiclo) {
            $this->dispatch('oops', message: 'Existe otro evento del mismo año en este turno');
            return;
        }


        // Crear el evento
        Evento::create([
            'fecha' => Carbon::parse($this->fecha),
            'turno_id' => $this->turno_id,
            'observacion' => $this->observacion,
            'actividad_id' => $this->actividad_id,
            'asignatura_id' => $this->asignatura_id,
        ]);

        // Resetear los campos después de guardar
        $this->reset(['open','fecha', 'hora_inicio', 'hora_fin', 'observacion', 'actividad_id', 'asignatura_id']);

        //aviso al listado que vuelva a renderizar ahora con el nuevo campo
        $this->dispatch('render');

        //emito el evento alert para que me muestre un mensaje
        $this->dispatch('alert', message: 'Evento creado con éxito');
    }

    public function render()
    {
        return view('livewire.create-evento');
    }
}
