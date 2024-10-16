<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class ShowUsuario extends Component
{
    public $search;
    public $usuarioEdit_id;
    public $usuario_edit;
    public $rol_id_edit;
    public $roles = [];
    public $open_edit = false;
    use WithPagination;

    public function mount($usuarioEdit_id = null)
    {
        if ($usuarioEdit_id) {
            $this->loadEditData();
        }
    }

    public function loadEditData()
    {
        $this->roles = Role::all();
        $this->rol_id_edit = $this->usuario_edit->roles[0]->id;
    }

    protected $rules = [
        'rol_id_edit' => 'required',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function edit(User $usuario)
    {
        $this->resetValidation();
        $this->open_edit = true;
        $this->usuarioEdit_id = $usuario->id;
        $this->usuario_edit = $usuario;
        $this->loadEditData();
    }

    public function update()
    {
        $this->validate([
            'rol_id_edit' => 'required'
        ]);
        $usuario = User::find($this->usuarioEdit_id);
        $rol = Role::find($this->rol_id_edit);
        $usuario->syncRoles($rol);
        $this->open_edit = false;
        $this->dispatch('alert', message: 'Usuario actualizado');
        $this->reset(['rol_id_edit', 'usuario_edit', 'usuarioEdit_id']);
    }

    public function render()
    {
        // $usuarios = User::paginate();
        $usuarios = User::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->paginate(15);

        return view('livewire.admin.show-usuario', compact('usuarios'));
    }
}
