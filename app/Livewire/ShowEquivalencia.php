<?php

namespace App\Livewire;

use App\Models\Asignatura;
use App\Models\Carrera;
use App\Models\Dictado;
use App\Models\DictadoComun;
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
    public $selectedAsignatura = null;
    public $equivalentes;
    public $noEquivalentes;

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

        //dd($asignaturas);
        return view('livewire.show-equivalencia', compact('asignaturas'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) { //si estoy en la misma columna me pregunto por la direccion de ordenamiento
            $this->direction = $this->direction == 'asc' ? 'desc' : 'asc';
        } else { //si es una columna nueva, ordeno de forma ascendente
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }


    //------ Metodo llamado al precionar el botor editar de cada fila --------

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
        //busca el id en la lista de equivalentes
        $asignatura = $this->buscarAsignatura($id, $this->equivalentes);

        //toma el objeto encontrado y lo agrega al listado de no equivalentes
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
        $this->validate([
            'asignaturaEdit_id' => 'required|exists:asignatura,id',
        ]);

        $asignatura = Asignatura::find($this->asignaturaEdit_id);

        // Obtener los IDs de las asignaturas equivalentes actuales
        $directas = $asignatura->dictadosComunes->pluck('id')->toArray();
        $inversas = $asignatura->dictadosComunesInversos->pluck('id')->toArray();
        $equivalentesActuales = array_unique(array_merge($directas, $inversas));

        // Obtener los IDs de las asignaturas equivalentes nuevas
        $equivalentesNuevos = array_column($this->equivalentes, 'id');

        // Asignaturas a agregar
        $agregar = array_diff($equivalentesNuevos, $equivalentesActuales);
        foreach ($agregar as $id) {
            DictadoComun::create([
                'asignatura_1' => $this->asignaturaEdit_id,
                'asignatura_2' => $id,
            ]);
        }

        // Asignaturas a eliminar
        $eliminar = array_diff($equivalentesActuales, $equivalentesNuevos);
        foreach ($eliminar as $id) {
            DictadoComun::where(function ($query) use ($id) {
                $query->where('asignatura_1', $this->asignaturaEdit_id)
                    ->where('asignatura_2', $id);
            })->orWhere(function ($query) use ($id) {
                $query->where('asignatura_1', $id)
                    ->where('asignatura_2', $this->asignaturaEdit_id);
            })->delete();
        }

        $this->reset(['open_edit', 'selectedAsignatura', 'equivalentes', 'noEquivalentes']);
        $this->dispatch('alert', message: 'Asignatura actualizada');
    }
}
