<?php

namespace App\Livewire;

use App\Models\Asignatura;
use App\Models\Carrera;
use App\Models\Dictado;
use App\Models\Evento;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAsignatura extends Component
{
    public $open_edit = false;
    public $open_show = false;
    public $open_detail = false;
    public $search = '';
    public $sort = 'nombre';
    public $direction = 'asc';
    public $carreras, $filtroCarrera = '';
    public $dictados, $filtroDictado = '';
    public $ciclos = [], $filtroAño = '';
    public $equivalencias;
    public $eventos_asignatura = [];
    public $asignatura_selected = null;
    public $asignaturaEdit_id;
    public $asignaturaEdit = [];

    //--- campos para el formulario de edicion ----------------------------------- 
    public $ciclo_edit;
    public $dictado_id_edit;
    public $responsable_edit;
    public $nombre_edit;
    public $codigo_edit;
    //--- campos para el formulario de edicion -----------------------------------

    use WithPagination;


    public function mount()
    {
        $this->carreras = Carrera::all();
        $this->dictados = Dictado::all();
        $this->ciclos = Asignatura::distinct()->pluck('ciclo')->toArray();
    }

    public function render()
    {
        $asignaturas = Asignatura::where(function ($query) {
            $query->where('nombre', 'like', "%{$this->search}%")
                ->orWhere('codigo', 'like', "%{$this->search}%");
        });

        if ($this->filtroDictado !== '') {
            $asignaturas->where('dictado_id', $this->filtroDictado);
        }

        if ($this->filtroCarrera !== '') {
            $asignaturas->where('carrera_id', $this->filtroCarrera);
        }
        if ($this->filtroAño !== '') {
            $asignaturas->where('ciclo', $this->filtroAño);
        }

        $asignaturas = $asignaturas->orderBy($this->sort, $this->direction)
            ->paginate(20);

        return view('livewire.show-asignatura', compact('asignaturas'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) { //si estoy en la misma columna me pregunto por la direccion de ordenamiento
            if ($this->direction == 'asc') {
                $this->direction == 'desc';
            } else {
                $this->direction == 'asc';
            }
        } else { //si es una columna nueva, ordeno de forma ascendente
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    //----------------------------------------------------------------------------
    //------ Metodo llamado al precionar el botor show de cada fila (eye) --------
    //----------------------------------------------------------------------------
    public function detail($id)
    {
        $this->resetValidation();
        $this->reset(['open_detail', 'asignatura_selected', 'eventos_asignatura']);
        // Obtener IDs de las asignaturas equivalentes
        $this->asignatura_selected = Asignatura::find($id);
        $directas = $this->asignatura_selected->equivalencias->pluck('id')->toArray();
        $inversas = $this->asignatura_selected->equivalenciasInversas->pluck('id')->toArray();
        $equivalencias = array_unique(array_merge($directas, $inversas, [$id]));

        $this->eventos_asignatura = Evento::whereIn('asignatura_id', $equivalencias)
            ->where('fecha', '>=', Carbon::today())
            ->get();

        $this->open_detail = true;
    }
    //------------------------------------------------------------------------

    //------------------------------------------------------------------------
    //------ Metodo llamado al precionar el botor editar de cada fila --------
    //------------------------------------------------------------------------
    public function edit($id)
    {
        $this->resetValidation();
        $this->open_edit = true;
        $this->asignatura_selected = Asignatura::find($id);
        $this->asignaturaEdit_id = $id;

        $this->ciclo_edit = $this->asignatura_selected->ciclo;
        $this->dictado_id_edit = $this->asignatura_selected->dictado_id;
        $this->responsable_edit = $this->asignatura_selected->responsable;
        $this->nombre_edit = $this->asignatura_selected->nombre;
        $this->codigo_edit = $this->asignatura_selected->codigo;
    }
    //------------------------------------------------------------------------

    public function update()
    {
        $this->validate([
            'nombre_edit' => 'required|max:100',
            'codigo_edit' => 'required|max:8',
            'ciclo_edit' => 'required',
            'dictado_id_edit' => 'required'
        ]);

        $asignatura = Asignatura::find($this->asignaturaEdit_id);
        $asignatura->update([
            'nombre' =>  $this->asignaturaEdit['nombre'],
            'codigo' =>  $this->asignaturaEdit['codigo'],
            'ciclo' =>  $this->asignaturaEdit['ciclo'],
            'dictado_id' =>  $this->asignaturaEdit['dictado_id'],
            'responsable' =>  $this->asignaturaEdit['responsable'],

        ]);

        $this->reset(['open_edit', 'asignaturaEdit', 'nombre', 'codigo', 'ciclo', 'responsable', 'dictado_id']);

        //emito el evento alert para que me muestre un mensaje
        $this->dispatch('alert', message: 'Asignatura actualizada');
    }
}
