<?php

namespace App\Livewire;

use App\Models\Actividad;
use App\Models\Evento;
use Livewire\Component;
use Livewire\Attributes\On;

class ShowEvento extends Component
{
    //---------- campos del formulario ------
    public $fecha, $turno, $observacion;
    //----------------------------------------

    public $eventoEdit = [
        'fecha' => '',
        'turno' => '',
        'observacion' => ''
    ];

    public $eventoEdit_id = '';
    public $search;
    public $sort = 'fecha';
    public $direction = 'desc';
    public $open_edit = false;

    public function mount(Evento $evento)
    {
        $this->fill($evento->only(['fecha', 'observacion']));

    }

    protected $rules = [
        'evento.observacion' => 'required|max:100',
        'evento.fecha' => 'required',
    ];

    //especifico a este componente que escuche el emit del evento 'render' y dispare mi metodo 'render'
    protected $listeners = ['render'];


    //------------------------------------------------------------------------
    //------ Metodo llamado al precionar el botor editar de cada fila --------
    //------------------------------------------------------------------------
    public function edit($evento_id)
    {
        $this->resetValidation();
        //$this->open_edit = true;
        //$evento = Evento::find($evento_id);
        
        dd($evento_id);
        //$this->eventoEdit_id = $evento_id;
        //$this->eventoEdit['fecha'] = $evento->fecha;
        //$this->eventoEdit['observacion'] = $evento->observacion;
    }
    //------------------------------------------------------------------------

    public function update()
    {
        $this->validate([
            'evento.observacion' => 'required|max:100',
            'evento.fecha' => 'required',
        ]);

        $evento = Evento::find($this->eventoEdit_id);
         $evento->update([
             'nombre' =>  $this->eventoEdit['nombre'],
             'codigo' =>  $this->eventoEdit['codigo'],
         ]);

        $this->reset(['open_edit', 'eventoEdit', 'nombre', 'codigo']);

        //emito el evento alert para que me muestre un mensaje
        $this->dispatch('alert', message: 'evento actualizado');
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

        $eventos = Evento::where('observacion', 'like', '%' . $this->search . '%')
        // ->orWhere('codigo', 'like', '%' . $this->search . '%')
        // ->orderBy($this->sort, $this->direction)
        ->get();
        //dd($eventos);
        return view('livewire.show-evento', compact('eventos'));
    }
}

    /*
            $table->increments('evento_id');
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('observacion');
            $table->foreignId('actividad_id')->constrained('actividad');
            $table->foreignId('asignatura_id')->constrained('asignatura');
    */
