<?php

namespace App\Livewire\Admin;

use App\Models\Asignatura;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class ShowUsuario extends Component
{
    public $search;
    public $usuarioEdit_id;
    public $usuario_edit;
    public $rol_id_edit = null;
    public $roles = [];
    public $open_edit = false;
    public $asignaturas_relacionadas;
    public $asignaturas_no_relacionadas;

    use WithPagination;

    public function mount($usuarioEdit_id = null)
    {
        $this->reset(['asignaturas_relacionadas', 'asignaturas_no_relacionadas']);
        $this->roles = Role::all();
        if ($usuarioEdit_id) {
            $this->usuario_edit = User::find($usuarioEdit_id);

            if ($this->usuario_edit) {
                $this->usuarioEdit_id = $usuarioEdit_id;
                // Verifica si el usuario tiene roles asignados
                $this->rol_id_edit = $this->usuario_edit->roles->isNotEmpty() ? $this->usuario_edit->roles->first()->id : null;

                // Obtener asignaturas relacionadas (corregido)

                $relacionadas_ids = $this->usuario_edit->asignaturas->pluck('id')->toArray();
                $this->asignaturas_relacionadas = Asignatura::whereIn('id', $relacionadas_ids)->get()->toArray();
                $this->asignaturas_no_relacionadas = Asignatura::whereNotIn('id', $relacionadas_ids)->get()->toArray();
            }
        } else {
            $this->asignaturas_relacionadas = [];
            $this->asignaturas_no_relacionadas = Asignatura::all()->toArray();
        }
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
        $this->mount($this->usuarioEdit_id);
    }

    public function update()
    {
        $this->validate();

        $usuario = User::findOrFail($this->usuarioEdit_id);
        $rol = Role::findOrFail($this->rol_id_edit);

        $usuario->syncRoles($rol);

        // Asegurar que solo se pasan los IDs en el array
        $asignatura_ids = array_map(fn($item) => is_array($item) ? $item['id'] : $item, $this->asignaturas_relacionadas);
        //dd($asignatura_ids);
        $usuario->asignaturas()->sync($asignatura_ids);

        $this->open_edit = false;
        $this->dispatch('alert', message: 'Usuario actualizado');
        $this->reset(['rol_id_edit', 'usuario_edit', 'usuarioEdit_id']);
    }

    // public function moverARelacionado($id)
    // {

    //     $asignatura = $this->buscarAsignatura($id, $this->asignaturas_no_relacionadas);

    //     if ($asignatura) {
    //         // Remover de asignaturas no relacionadas
    //         $this->asignaturas_no_relacionadas = array_filter($this->asignaturas_no_relacionadas, fn($item) => $item['id'] != $id);

    //         // Agregar solo el ID a `asignaturas_relacionadas` (para evitar problemas con `sync()`)
    //         $this->asignaturas_relacionadas[] = $asignatura;
    //     }
    // }

    // public function moverANoRelacionado($id)
    // {
    //     // Buscar la asignatura en asignaturas_relacionadas
    //     $asignatura = $this->buscarAsignatura($id, $this->asignaturas_relacionadas);

    //     if ($asignatura) {
    //         // Remover de asignaturas relacionadas
    //         $this->asignaturas_relacionadas = array_filter($this->asignaturas_relacionadas, fn($item) => $item['id'] != $id);

    //         // Agregar a asignaturas no relacionadas
    //         $this->asignaturas_no_relacionadas[] = $asignatura;
    //     }
    // }

    public function moverARelacionado($id)
    {
        // Buscar la asignatura principal
        $asignatura = Asignatura::find($id);

        if ($asignatura) {
            // Obtener todas las asignaturas equivalentes (dictados comunes y comunes inversos)
            $directas = $asignatura->dictadosComunes->pluck('id')->toArray();
            $inversas = $asignatura->dictadosComunesInversos->pluck('id')->toArray();
            $equivalentesIds = array_unique(array_merge([$id], $directas, $inversas));

            foreach ($equivalentesIds as $asignaturaId) {
                // Buscar en la lista de no relacionadas
                $asignaturaData = $this->buscarAsignatura($asignaturaId, $this->asignaturas_no_relacionadas);

                if ($asignaturaData) {
                    // Remover de asignaturas no relacionadas
                    $this->asignaturas_no_relacionadas = array_filter($this->asignaturas_no_relacionadas, fn($item) => $item['id'] != $asignaturaId);

                    // Agregar a asignaturas relacionadas
                    $this->asignaturas_relacionadas[] = $asignaturaData;
                }
            }
        }
    }

    public function moverANoRelacionado($id)
    {
        // Buscar la asignatura principal
        $asignatura = Asignatura::find($id);

        if ($asignatura) {
            // Obtener todas las asignaturas equivalentes (dictados comunes y comunes inversos)
            $directas = $asignatura->dictadosComunes->pluck('id')->toArray();
            $inversas = $asignatura->dictadosComunesInversos->pluck('id')->toArray();
            $equivalentesIds = array_unique(array_merge([$id], $directas, $inversas));

            foreach ($equivalentesIds as $asignaturaId) {
                // Buscar en la lista de relacionadas
                $asignaturaData = $this->buscarAsignatura($asignaturaId, $this->asignaturas_relacionadas);

                if ($asignaturaData) {
                    // Remover de asignaturas relacionadas
                    $this->asignaturas_relacionadas = array_filter($this->asignaturas_relacionadas, fn($item) => $item['id'] != $asignaturaId);

                    // Agregar a asignaturas no relacionadas
                    $this->asignaturas_no_relacionadas[] = $asignaturaData;
                }
            }
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

    public function render()
    {
        // $usuarios = User::paginate();
        $usuarios = User::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->paginate(15);

        return view('livewire.admin.show-usuario', compact('usuarios'));
    }
}
