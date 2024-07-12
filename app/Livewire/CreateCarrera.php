<?php

namespace App\Livewire;

use App\Models\Carrera;
use Livewire\Component;

class CreateCarrera extends Component
{
    public $open = false; //sirve para que el modal no se visualice al renderizar el componente
    public $nombre, $codigo;
    public $carreras;

    public function mount()
    {
        $this->carreras = Carrera::all();
    }

    protected $rules = [
        'nombre' => 'required|max:100',
        'codigo' => 'required|max:8',
    ];

    public function ubdated($pNombre)
    {
        $this->validateOnly($pNombre);
    }

    public function save()
    {
        $this->validate();

        // Carrera::create([
        //     'nombre' => $this->nombre,
        //     'codigo' => $this->codigo
        // ]);

        $carrera = Carrera::create(
            $this->only('nombre', 'codigo')
        );

        //luego de guardar, se limpian los campos del fomulario
        $this->reset(['open', 'nombre', 'codigo']);

        //aviso al listado que vuelva a renderizar ahora con el nuevo campo
        $this->dispatch('render');

        //emito el evento alert para que me muestre un mensaje
        $this->dispatch('alert', message: 'Carrera creada con éxito');
    }

    public function render()
    {
        return view('livewire.create-carrera');
    }
}
