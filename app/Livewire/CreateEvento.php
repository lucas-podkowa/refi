<?php

namespace App\Livewire;

use App\Models\Actividad;
use App\Models\Asignatura;
use App\Models\Carrera;
use App\Models\Evento;
use App\Models\Turno;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateEvento extends Component
{

    //---- campos del formulario ----------
    public $actividad_id = null;
    public $carrera_id = null;
    public $selectedCiclo = null;
    public $asignatura_id = null;
    public $turno_id = null;
    public $fecha;
    public $observacion = '';

    //-------------------------------------
    public $open = false; //sirve para que el modal no se visualice al renderizar el componente
    public $actividades;
    public $carreras;
    public $turnos;
    public $ciclos;
    public $asignaturas;

    protected $rules = [
        'fecha' => 'required|date|after_or_equal:today',
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
        $this->fecha = Carbon::now()->format('d-m-Y'); // Inicializa con la fecha actual


        if ($this->turnos->isNotEmpty()) {
            $this->turno_id = $this->turnos->first()->id;
        }
        if ($this->carreras->isNotEmpty()) {
            $this->carrera_id = $this->carreras->first()->id;
            $this->updatedCarreraId($this->carrera_id); // Llamar para cargar ciclos y asignaturas
        }

        if ($this->actividades->isNotEmpty()) {
            $this->actividad_id = $this->actividades->first()->id;
        }

        if ($this->asignaturas->isNotEmpty()) {
            $this->asignatura_id = $this->asignaturas->first()->id;
        }

        // if (count($this->turnos) > 0) {
        //     $this->turno_id = $this->turnos->first()->id;
        // }

        // if (count($this->carreras) > 0) {
        //     $this->carrera_id = $this->carreras->first()->id;
        // }
    }


    public function updating($property, $value)
    {
        if ($property == 'carrera_id') {
            $this->reset(['ciclos', 'selectedCiclo', 'asignaturas', 'asignatura_id']);
        }

        if ($property == 'selectedCiclo') {
            $this->reset(['asignaturas', 'asignatura_id']);
        }
    }

    public function updatedCarreraId($value)
    {
        $ciclos = Asignatura::where('carrera_id', $value)
            ->select('ciclo')
            ->distinct()
            ->get()
            ->pluck('ciclo');

        $this->ciclos = collect($ciclos);

        if ($this->ciclos->isNotEmpty()) {
            $this->selectedCiclo = $this->ciclos->first();
            $this->updatedSelectedCiclo($this->selectedCiclo);
        }
    }

    public function updatedSelectedCiclo($value)
    {
        $asignaturas = Asignatura::where('carrera_id', $this->carrera_id)
            ->where('ciclo', $value)
            ->get();

        $this->asignaturas = collect($asignaturas);

        if ($this->asignaturas->isNotEmpty()) {
            $this->asignatura_id = $this->asignaturas->first()->id;
        }
    }



    public function save()
    {
        $this->validate();


        // Obtener las Dictados Comunes de la asignatura y luego añadir la propia asignatura al array de dictados comunes
        $asignatura = Asignatura::find($this->asignatura_id);
        $directas = $asignatura->dictadosComunes->pluck('id')->toArray();
        $inversas = $asignatura->dictadosComunesInversos->pluck('id')->toArray();
        $dictadosComunes_id = array_unique(array_merge($directas, $inversas));

        // Comprobar si existe un evento en la misma fecha para la asignatura o sus dictados comunes
        $eventoFecha = Evento::where('fecha', Carbon::parse($this->fecha))
            ->whereIn('asignatura_id', $dictadosComunes_id)
            ->first();

        if ($eventoFecha) {
            $this->dispatch('oops', message: 'Existen registros de Dictados Comúnes');
            return;
        }


        // Comprobar si existe un evento en el mismo turno para otras asignaturas del mismo ciclo y carrera
        $ciclo = $asignatura->ciclo;
        $carrera = $asignatura->carrera_id;

        $eventoMismoCicloMismaCarrera = Evento::where('turno_id', $this->turno_id)
            ->where('fecha', Carbon::parse($this->fecha))
            ->whereHas('asignatura', function ($query) use ($ciclo, $carrera) {
                $query->where('ciclo', $ciclo)
                    ->where('carrera_id', $carrera);  // Misma carrera
            })
            ->first();

        if ($eventoMismoCicloMismaCarrera) {
            $this->dispatch('oops', message: 'Existe otro evento del mismo año y carrera en este turno');
            return;
        }


        // Crear el evento
        Evento::create([
            'fecha' => Carbon::parse($this->fecha),
            'turno_id' => $this->turno_id,
            'observacion' => $this->observacion,
            'actividad_id' => $this->actividad_id,
            'asignatura_id' => $this->asignatura_id,
            'user_id' => Auth::id(), // Asignar usuario autenticado
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
