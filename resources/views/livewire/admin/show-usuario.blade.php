<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <x-table>
        <div class="px-6 py-4 flex">
            <!-- input de jetstream utilizado para el buscador -->
            <x-input wire:model.live="search" placeholder="Ingrese el nombre o email del Usuario" type="text"
                class="flex-1 mr-4" />

            {{-- @livewire('create-asignatura') --}}
        </div>

        @if ($usuarios->count() > 0)



            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500">
                            Nombre
                        </th>
                        <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500">
                            Email
                        </th> {{-- <th>Rol</th> --}}
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td class="px-6 py-3">{{ $usuario->name }}</td>
                            <td class="px-6 py-3">{{ $usuario->email }}</td>
                            {{-- <td>{{ $usuario->roles->first()->name }}</td> --}}
                            <td class="px-6 py-3 whitespace-nowrap text-sm font-medium">

                                {{-- aqui esta el boton editar que dispara el metodo edit y este muestra el modal --}}
                                <a class="btn btn-blue-green px-2" href="#"
                                    wire:click="edit({{ $usuario }})">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div>No se encontraron registros</div>

        @endif

        <div class="py-4">
            @if ($usuarios->links())
                {{ $usuarios->links() }}
            @endif
        </div>

    </x-table>


    {{-- ------------------------  DIALOG MODAL visualizado al precionar el boton editar --------------------------- --}}

    <form wire:submit="update">
        <x-dialog-modal wire:model="open_edit">

            <x-slot name="title">
                {{-- Editando la Carrera: {{ $carreraEdit->nombre }} --}}
            </x-slot>


            <x-slot name="content">
                @if ($usuario_edit)
                    <h2>Rol del Usuario: {{ $usuario_edit->name }}</h2>
                @else
                    <h2>Rol del Usuario</h2>
                @endif

                <div class="mt-4 grid">
                    @foreach ($roles as $rol)
                        <div class="flex items-center">
                            <input wire:model="rol_id_edit" type="radio" id="rol-{{ $rol->id }}"
                                value="{{ $rol->id }}">
                            <label for="rol-{{ $rol->id }}"
                                class="ml-2 block text-sm font-medium text-gray-700">{{ $rol->name }}</label>
                        </div>
                    @endforeach
                    @error('rol_id_edit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button class="mr-2" wire:click="$set('open_edit', false)">
                    Cancelar
                </x-secondary-button>

                <x-button wire:loading.attr="disabled" class="disabled:opacity-25">
                    Actualizar
                </x-button>
            </x-slot>

        </x-dialog-modal>

    </form>

    {{-- ------------------------  DIALOG MODAL visualizado al precionar el boton editar --------------------------- --}}

</div>
