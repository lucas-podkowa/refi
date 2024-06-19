<?php

namespace App\Livewire;

use App\Models\Asignatura;
use Livewire\Component;

class AsignaturaList extends Component
{

    public $search;
    public $sort = 'nombre';
    public $direction = 'asc';


    public function render()
    {
        //$asignatuas = Asignatura::all();  //si quisiera traer todos los registros sin filtro alguno

        $asignaturas = Asignatura::where('nombre', 'like', '%' . $this->search . '%')
            ->orWhere('codigo', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->get();

        return view('livewire.asignatura-list', compact('asignaturas'));
    }

    public function order($sort)
    {
        if ( $this->sort == $sort ) { //si estoy en la misma columna me pregunto por la direccion de ordenamiento
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
}
