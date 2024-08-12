<?php

namespace App\Livewire;

use App\Models\Actividad;
use App\Models\Asignatura;
use App\Models\Carrera;
use App\Models\Evento;
use App\Models\Turno;
use Carbon\Carbon;
use Livewire\Component;

class CreateEvento extends Component
{

    //---- campos del formulario ----------
    public $actividad_id = null;
    public $carrera_id = null;
    public $selectedCiclo = null;
    public $asignatura_id = null;
    public $fecha;
    public $turno_id;
    public $observacion = '';

    //-------------------------------------
    public $open = false; //sirve para que el modal no se visualice al renderizar el componente
    public $actividades = [];
    public $carreras = [];
    public $turnos = [];
    public $ciclos;
    public $asignaturas = [];

    protected $rules = [
        'fecha' => 'required|date',
        'observacion' => 'nullable|string',
        'actividad_id' => 'required|integer',
        'asignatura_id' => 'required|integer',
    ];


    public function mount()
    {
        $this->actividades = Actividad::all();
        $this->carreras = Carrera::all();
        $this->turnos = Turno::all();
        $this->ciclos = collect();
        $this->asignaturas = collect();

        // if ($this->actividades->isNotEmpty()) {
        //     $this->actividad_id = $this->actividades->first()->id;
        // }
        // if ($this->carreras->isNotEmpty()) {
        //     $this->carrera_id = $this->carreras->first()->id;
        //     //dd($this->carrera_id);
        // }
    }

   
    public function updating($property, $value)
    {
        if ($property == 'carrera_id') {
            $this->reset(['asignaturas', 'asignatura_id']);
            $this->ciclos = Asignatura::distinct()->pluck('ciclo')->toArray();
        }
        if ($property == 'selectedCiclo') {
            $this->reset(['asignatura_id']);
            //$this->asignatura_id = null;
            $this->asignaturas = Asignatura::where('carrera_id', $this->carrera_id)
                ->where('ciclo', $value)->get();
        }
    }
    
    public function updated($property, $value)
    {
        if ($property == 'carrera_id') {
            $this->selectedCiclo = $this->ciclos[0] ?? null;
        }
        if ($property == 'selectedCiclo') {
            $this->asignatura_id = $this->asignaturas[0]->id ?? null;
        }
    }



    public function save()
    {
        $this->validate();


        // Obtener las equivalencias de la asignatura y luego añadir la propia asignatura al array de equivalencias
        $asignatura = Asignatura::find($this->asignatura_id);
        $directas = $asignatura->equivalencias->pluck('id')->toArray();
        $inversas = $asignatura->equivalenciasInversas->pluck('id')->toArray();
        $equivalencias_id = array_unique(array_merge($directas, $inversas));
        //$equivalencias = Asignatura::whereIn('id', $equivalentesIds)->get();

        // Comprobar si existe un evento en la misma fecha para la asignatura o sus equivalencias
        $eventoFecha = Evento::where('fecha', Carbon::parse($this->fecha))
            ->whereIn('asignatura_id', $equivalencias_id)
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
        $this->reset([
            'actividad_id',
            'open',
            'fecha',
            'observacion',
            'asignatura_id',
            'selectedCiclo',
            'carrera_id'
        ]);

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
