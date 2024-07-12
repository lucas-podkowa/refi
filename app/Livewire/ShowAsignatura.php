<?php

namespace App\Livewire;

use App\Models\Asignatura;
use App\Models\Carrera;
use App\Models\Dictado;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAsignatura extends Component
{
    public $open_show = false;
    public $search = '';
    public $sort = 'nombre';
    public $direction = 'asc';
    public $carreras, $filtroCarrera = '';
    public $dictados, $filtroDictado = '';
    public $ciclos = [], $filtroAño = '';
    public $equivalencias;

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

    //------------------------------------------------------------------------
    //------ Metodo llamado al precionar el botor show de cada fila (eye) --------
    //------------------------------------------------------------------------
    public function show($id)
    {
        $this->resetValidation();
        $this->open_show = true;
        $asignatura = Asignatura::find($id);

        if ($asignatura) {
            // Carga las equivalencias usando el método definido en el modelo
            $this->equivalencias = $asignatura->equivalencias;
        } else {
            $this->equivalencias = [];
        }

        dd($this->equivalencias);
        // $this->carreraEdit_id = $carrera_id;
        // $this->carreraEdit['nombre'] = $carrera->nombre;
        // $this->carreraEdit['codigo'] = $carrera->codigo;
    }
    //------------------------------------------------------------------------
}
