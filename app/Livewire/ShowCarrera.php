<?php

namespace App\Livewire;

use App\Models\Carrera;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowCarrera extends Component
{
    //---------- campos del formulario ------
    public $nombre, $codigo;
    //----------------------------------------

    public $carreraEdit = [
        'nombre' => '',
        'codigo' => ''
    ];
    public $carreraEdit_id = '';
    public $search;
    public $sort = 'nombre';
    public $direction = 'asc';
    public $open_edit = false;

    public function mount(Carrera $carrera)
    {
        $this->fill($carrera->only(['nombre', 'codigo']));
    }

    protected $rules = [
        'carrera.nombre' => 'required|max:100',
        'carrera.codigo' => 'required|max:8',
    ];

    //especifico a este componente que escuche el emit del evento 'render' y dispare mi metodo 'render'
    protected $listeners = ['render'];


    //------------------------------------------------------------------------
    //------ Metodo llamado al precionar el botor editar de cada fila --------
    //------------------------------------------------------------------------
    public function edit($carrera_id)
    {
        $this->resetValidation();
        $this->open_edit = true;
        $carrera = Carrera::find($carrera_id);
        $this->carreraEdit_id = $carrera_id;
        $this->carreraEdit['nombre'] = $carrera->nombre;
        $this->carreraEdit['codigo'] = $carrera->codigo;
    }
    //------------------------------------------------------------------------

    public function update()
    {
        $this->validate([
            'carreraEdit.nombre' => 'required|max:100',
            'carreraEdit.codigo' => 'required|max:8'
        ]);

        $carrera = Carrera::find($this->carreraEdit_id);
         $carrera->update([
             'nombre' =>  $this->carreraEdit['nombre'],
             'codigo' =>  $this->carreraEdit['codigo'],
         ]);

        $this->reset(['open_edit', 'carreraEdit', 'nombre', 'codigo']);

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

}
