<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">


        <x-table>

            {{-- ------------------- Buscador de la tabla ------------------------------------------------------- --}}
            <div class="px-6 py-4 flex">
                <!-- input de jetstream utilizado para el buscador -->
                <x-input class="flex-1 mr-4" placeholder="Buscar carrera" type="text" wire:model.live="search" />

                {{-- este es un componente hijo, tiene un boton y el formulario para crear una carrera --}}
                @livewire('create-carrera')

            </div>
            {{-- ------------------- Buscador de la tabla ------------------------------------------------------- --}}



            {{-- $carreras es esta en el metodo render de la clase y es enviada aqui como un parametro --}}
            @if ($carreras->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500"
                                {{-- aqui disparo "public function order($sort)" que esta en la clase --}} wire:click="order('nombre')">
                                Nombre

                                {{-- $sort es una propiedad de la clase --}}
                                @if ($sort == 'nombre')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif

                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500"
                                {{-- aqui disparo "public function order($sort)" que esta en la clase --}} wire:click="order('codigo')">
                                Codigo

                                {{-- $sort --}}
                                @if ($sort == 'codigo')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif

                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($carreras as $item)
                            <tr>
                                <td class="px-6 py-3">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->nombre }}
                                    </div>
                                </td>
                                <td class="px-6 py-3">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->codigo }}
                                    </div>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium">

                                    {{-- aqui esta el boton editar que dispara el metodo edit y este muestra el modal --}}
                                    <a class="btn btn-blue-green" href="#" wire:click="edit({{ $item->id }})">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No existen registros para mostrar
                </div>
            @endif

        </x-table>
    </div>




    {{-- ------------------------  DIALOG MODAL visualizado al precionar el boton editar --------------------------- --}}

    <form wire:submit="update">
        <x-dialog-modal wire:model="open_edit">

            <x-slot name="title">
                {{-- Editando la Carrera: {{ $carreraEdit->nombre }} --}}
            </x-slot>


            <x-slot name="content">


                {{-- wire:model.defer le decimos a livewire que NO vuelva a renderizar el componente cada vez 
            que cambie la propiedad relacionada, sino que lo haga solo cuando se desencadene alguna accion  --}}
                <div class="mb-4">
                    <x-label value="Nombre de la Carrera" />
                    <x-input wire:model="carreraEdit.nombre" required type="text" class="w-full" />
                    <x-input-error for='carreraEdit.nombre' />
                </div>
                <div class="mb-4">
                    <x-label value="Codigo" />
                    <x-input wire:model="carreraEdit.codigo" required type="text" class="w-full" />
                    <x-input-error for='carreraEdit.codigo' />
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
