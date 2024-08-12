<?php

namespace App\Livewire;

use App\Models\Asignatura;
use App\Models\Carrera;
use App\Models\Dictado;
use Livewire\Component;

class CreateAsignatura extends Component
{

    //---- campos del formulario ----------
    public $nombre = null;
    public $codigo = null;
    public $ciclo = null;
    public $carrera_id = null;
    public $dictado_id = null;
    public $responsable = null;


    //-------------------------------------
    public $open = false; //sirve para que el modal no se visualice al renderizar el componente

    public $carreras = [];
    public $dictados = [];
    public $ciclos = [];

    protected $rules = [
        'nombre' => 'required|max:100',
        'codigo' => 'required|max:8',
        'ciclo' => 'required|integer',
        'carrera_id' => 'required|integer',
        'dictado_id' => 'required|integer',
    ];

    public function mount()
    {
        $this->carreras = Carrera::all();
        $this->dictados = Dictado::all();
        $this->ciclos = [1, 2, 3, 4, 5];
    }


    public function updating($property, $value)
    {
        // if ($property == 'carrera_id') {
        //     $this->reset(['ciclos', 'asignatura_id']);
        //     $this->ciclos = Asignatura::distinct()->pluck('ciclo')->toArray();
        // }
    }

    public function updated($property, $value)
    {
        // if ($property == 'carrera_id') {
        //     $this->selectedCiclo = $this->ciclos[0] ?? null;
        // }
    }


    public function save()
    {
        $this->validate();

        // --- restricciones --------------------------------------
        $mismoCodigo = Asignatura::where('codigo', $this->codigo)->first();
        if ($mismoCodigo) {
            $this->dispatch('oops', message: 'Existe otra asignatura con el mismo código');
            return;
        }

        $mismoNombreyCarrera = Asignatura::where('nombre', $this->nombre)
            ->where('carrera_id', $this->carrera_id)
            ->first();

        if ($mismoNombreyCarrera) {
            $this->dispatch('oops', message: 'Existe otra asignatura con el mismo nombre en ésta carrera');
            return;
        }
        // --- restricciones --------------------------------------

        // Crear Asignatura
        Asignatura::create([
            'nombre' => $this->nombre,
            'codigo' => $this->codigo,
            'ciclo' => $this->ciclo,
            'carrera_id' => $this->carrera_id,
            'dictado_id' => $this->dictado_id,
        ]);

        // Resetear los campos después de guardar
        $this->reset([
            'nombre',
            'codigo',
            'ciclo',
            'carrera_id',
            'dictado_id',
            'open'
        ]);

        //aviso al listado que vuelva a renderizar ahora con el nuevo campo
        $this->dispatch('render');

        //emito el evento alert para que me muestre un mensaje
        $this->dispatch('alert', message: 'Asignatura creada con éxito');
    }

    public function render()
    {
        return view('livewire.create-asignatura');
    }
}
