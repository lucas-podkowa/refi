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
use Livewire\Attributes\On;
use Livewire\WithPagination;

class ShowEvento extends Component
{
    use WithPagination;

    //---- campos del formulario -------------
    public $asignatura_id_edit = null;
    public $actividad_id_edit;
    public $turno_id_edit;
    public $fecha_edit;
    public $observacion_edit;
    public $carrera_id = null;
    public $selectedCiclo = null;
    //----------------------------------------    

    //---- campos para los selects  ----------
    public $actividades = [];
    public $carreras = [];
    public $turnos = [];
    public $ciclos = [];
    public $asignaturas = [];
    //----------------------------------------

    public $eventoEdit_id = '';
    public $search;
    public $sort = 'fecha';
    public $direction = 'desc';
    public $open_edit = false;
    public $user = false;



    public function mount($eventoEdit_id = null)
    {
        $this->user = Auth::user();

        if ($eventoEdit_id) {
            $this->loadEditData();
        }

        $this->actividades = Actividad::all();
        $this->carreras = Carrera::all();
        $this->turnos = Turno::all();
        $this->ciclos = collect();
        $this->asignaturas = collect();
    }

    protected $rules = [
        'asignatura_id_edit' => 'required',
        'turno_id_edit' => 'required',
        'actividad_id_edit' => 'required',
        'fecha_edit' => 'required'
    ];

    public function updatedSearch()
    {
        $this->resetPage(); // Resetear paginación al buscar
    }

    //------------------------------------------------------------------------
    //--- Metodo llamado al editar una fila --> wire:click="edit({{ $evento->id }})
    //------------------------------------------------------------------------
    public function edit($evento_id)
    {
        $this->resetValidation();
        $this->open_edit = true;
        $this->eventoEdit_id = $evento_id;
        $this->loadEditData();
    }

    //------------------------------------------------------------------------
    //--- Metodo llamado al precionar guardar en el formulario de edicion ----
    //------------------------------------------------------------------------
    public function update()
    {
        $this->validate([
            'asignatura_id_edit' => 'required',
            'turno_id_edit' => 'required',
            'actividad_id_edit' => 'required',
            'fecha_edit' => 'required'
        ]);

        $evento = Evento::find($this->eventoEdit_id);
        $evento->update([
            'fecha' => Carbon::parse($this->fecha_edit),
            'observacion' => $this->observacion_edit,
            'asignatura_id' =>  $this->asignatura_id_edit,
            'turno_id' => $this->turno_id_edit,
            'actividad_id' => $this->actividad_id_edit
        ]);

        $this->reset([
            'open_edit',
            'fecha_edit',
            'observacion_edit',
            'asignatura_id_edit',
            'turno_id_edit',
            'actividad_id_edit'
        ]);

        // //emito el evento alert para que me muestre un mensaje
        $this->dispatch('alert', message: 'evento actualizado');
    }

    public function delete($evento_id)
    {
        $evento = Evento::find($evento_id);

        if ($evento->user_id !== Auth::id()) {
            $this->dispatch('oops', message: 'No tienes permiso para eliminar este evento');
            return;
        }

        $evento->delete();
        //$this->dispatch('deleted', message: 'Evento eliminado con exito');
    }

    //------------------------------------------------------------------------
    //--- Metodos encargados de mantener la interfaz y las variables actualizadas 
    //------------------------------------------------------------------------
    // Cargar datos para edición
    public function loadEditData()
    {
        $evento = Evento::find($this->eventoEdit_id);
        $this->fecha_edit = $evento->fecha;
        $this->observacion_edit = $evento->observacion;
        $this->turno_id_edit = $evento->turno->id;
        $this->actividad_id_edit = $evento->actividad->id;
        $this->asignatura_id_edit = $evento->asignatura->id;
        $this->carrera_id = $evento->asignatura->carrera->id;
        $this->selectedCiclo = $evento->asignatura->ciclo;
        $this->loadCiclos();
        $this->loadAsignaturas();
    }

    protected function loadCiclos()
    {
        $this->ciclos = Asignatura::distinct()->pluck('ciclo')->toArray();
    }

    // --- Obtener asignaturas basadas en la carrera y el año seleccionados
    protected function loadAsignaturas()
    {
        $this->asignaturas = Asignatura::where('carrera_id', $this->carrera_id)
            ->where('ciclo', $this->selectedCiclo)->get();
    }

    // --- llamado cada vez que se modifica el SELECT de carrera
    public function updatedCarreraId($carrera_id)
    {
        $this->carrera_id = $carrera_id;
        $this->loadCiclos();
        $this->reset('selectedCiclo');
        $this->reset('asignatura_id_edit');
    }
    // --- llamado cada vez que se modifica el SELECT de año
    public function updatedSelectedCiclo($selectedCiclo)
    {
        $this->selectedCiclo = $selectedCiclo;
        $this->loadAsignaturas();
        $this->reset('asignatura_id_edit');
    }

    //------------------------------------------------------------------------

    public function order($sort)
    {
        if ($this->sort == $sort) { //si estoy en la misma columna me pregunto por la direccion de ordenamiento
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else { //si es una columna nueva, ordeno de forma ascendente
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    #[On('render')]
    public function render()
    {
        $eventos = Evento::query()
            ->when($this->search, function ($query) {
                $query->where('observacion', 'like', '%' . $this->search . '%')
                    ->orWhereHas('asignatura', function ($query) {
                        $query->where('nombre', 'like', '%' . $this->search . '%');
                    });
            })
            ->orderBy($this->sort, $this->direction)
            ->paginate(10);

        return view('livewire.show-evento', compact('eventos'));
    }
}
