<?php

namespace App\Livewire;

use App\Models\Asignatura;
use App\Models\Carrera;
use App\Models\Dictado;
use Livewire\Component;
use Livewire\WithPagination;

class ShowEquivalencia extends Component
{
    public $open_edit = false;
    public $open_show = false;
    //public $open_detail = false;
    public $search = '';
    public $sort = 'nombre';
    public $direction = 'asc';
    public $carreras, $filtroCarrera = '';
    public $dictados, $filtroDictado = '';
    public $ciclos = [], $filtroAño = '';
    public $dictadosComunes;
    public $asignaturaEdit_id;
    public $asignaturaEdit = [];

    //public $asignaturas;
    public $selectedAsignatura = null;
    public $equivalentes;
    public $noEquivalentes;


    use WithPagination;


    public function mount()
    {
        //$this->asignaturas = Asignatura::all();
        $this->selectedAsignatura = null;
        $this->equivalentes = [];
        $this->noEquivalentes = [];

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

        //dd($asignaturas);
        return view('livewire.show-equivalencia', compact('asignaturas'));
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
    //------ Metodo llamado al precionar el botor editar de cada fila --------
    //------------------------------------------------------------------------

    // public function selectAsignatura($id)
    // {
    //     $this->selectedAsignatura = Asignatura::find($id);
    //     $this->equivalentes = $this->selectedAsignatura->dictadosComunes;

    //     $equivalentesIds = $this->equivalentes->pluck('asignatura_id')->toArray();
    //     $this->noEquivalentes = Asignatura::whereNotIn('asignatura_id', $equivalentesIds)
    //                                       ->where('asignatura_id', '!=', $id)
    //                                       ->get();
    // }


    public function edit($id)
    {
        $this->resetValidation();

        $this->reset(['open_edit', 'selectedAsignatura']);
        // Obtener IDs de las asignaturas equivalentes
        $this->selectedAsignatura = Asignatura::find($id);

        $directas = $this->selectedAsignatura->dictadosComunes->pluck('id')->toArray();
        $inversas = $this->selectedAsignatura->dictadosComunesInversos->pluck('id')->toArray();

        $equivalentesIds = array_unique(array_merge($directas, $inversas));
        $this->equivalentes = Asignatura::whereIn('id', $equivalentesIds)->get()->toArray();

        $this->noEquivalentes = Asignatura::whereNotIn('id', $equivalentesIds)
            ->where('id', '!=', $id)
            ->get()->toArray();

        $this->asignaturaEdit_id = $id;
        $this->open_edit = true;
    }
    //------------------------------------------------------------------------


    public function moverAEquivalentes($id)
    {
        $asignatura = $this->buscarAsignatura($id, $this->noEquivalentes);

        if ($asignatura) {
            $this->noEquivalentes = array_filter(
                $this->noEquivalentes,
                function ($item) use ($id) {
                    return $item['id'] != $id;
                }
            );
            $this->equivalentes[] = $asignatura;
        }
    }

    public function moverANoEquivalentes($id)
    {
        $asignatura = $this->buscarAsignatura($id, $this->equivalentes);

        if ($asignatura) {
            $this->equivalentes = array_filter(
                $this->equivalentes,
                function ($item) use ($id) {
                    return $item['id'] != $id;
                }
            );
            $this->noEquivalentes[] = $asignatura;
        }
    }

    private function buscarAsignatura($id, $lista)
    {
        foreach ($lista as $asignatura) {
            if ($asignatura['id'] == $id) {
                return $asignatura;
            }
        }
        return null;
    }



    public function update()
    {
        //printf( $this->equivalentes);
        //dd( $this->noEquivalentes);

        $this->validate([
            'asignaturaEdit.nombre' => 'required|max:100',
            'asignaturaEdit.codigo' => 'required|max:8',
            'asignaturaEdit.ciclo' => 'required',
            'asignaturaEdit.dictado_id' => 'required'
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
