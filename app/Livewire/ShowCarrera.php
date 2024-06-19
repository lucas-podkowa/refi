<?php

namespace App\Livewire;

use App\Models\Carrera;
use Livewire\Component;
use Livewire\Attributes\On;

class ShowCarrera extends Component
{
    public $search, $carrera, $nombre, $codigo;
    public $sort = 'nombre';
    public $direction = 'asc';
    public $open_edit = false;

    public function mount(Carrera $carrera){
        $this->fill($carrera->only(['nombre', 'codigo']));
    }

    protected $rules = [
        'carrera.nombre' => 'required|max:100',
        'carrera.codigo' => 'required|max:8',
    ];

    //especifico a este componente que escuche el emit del evento 'render' y dispare mi metodo 'render'
    protected $listeners = ['render'];

    #[On('render')]
    public function render()
    {
        //$carreras = Carrera::all();  //si quisiera traer todos los registros sin filtro alguno

         $carreras = Carrera::where('nombre', 'like', '%' . $this->search . '%')
             ->orWhere('codigo', 'like', '%' . $this->search . '%')
             ->orderBy($this->sort, $this->direction)
             ->get();


        return view('livewire.show-carrera', compact('carreras'));
    }

    public function edit(Carrera $carrera)
    {
        $this->fill($carrera->only(['nombre', 'codigo']));
        $this->open_edit = true;
    }

    public function update()
    {
        $this->validate();
        $this->carrera->save();

        //luego de guardar, se limpian los campos del fomulario
        $this->reset(['open_edit']);

        //emito el evento alert para que me muestre un mensaje
        $this->dispatch('alert', message: 'Carrera actualizada');
    }

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
}
