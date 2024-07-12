<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">


        <x-table>

            {{-- ------------------- Filtros de la tabla ------------------------------------------------------- --}}
            <div class="px-6 py-4 flex">
                <!-- input de jetstream utilizado para el buscador -->
                <x-input wire:model.live="search" placeholder="Buscar Asignatura" type="text" class="flex-1 mr-4" />

                <select wire:model.live="filtroCarrera"
                    class="flex-1 mr-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="">Todas las Carreras</option>
                    @foreach ($carreras as $carrera)
                        <option value="{{ $carrera->id }}">
                            {{ $carrera->nombre }}
                        </option>
                    @endforeach
                </select>
                <select wire:model.live="filtroDictado"
                    class="flex-1 mr-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="">Todos los Dictados</option>
                    @foreach ($dictados as $dictado)
                        <option value="{{ $dictado->id }}">
                            {{ $dictado->nombre }}
                        </option>
                    @endforeach
                </select>
                <select wire:model.live="filtroAño"
                class="flex-1 mr-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">Todos los Años</option>
                @foreach ($ciclos as $ciclo)
                    <option value="{{ $ciclo }}">
                        {{ $ciclo}}
                    </option>
                @endforeach
            </select>

                {{-- este es un componente hijo, tiene un boton y el formulario para crear una carrera --}}
                {{-- @livewire('create-carrera') --}}

            </div>
            {{-- ------------------- Filtros de la tabla ------------------------------------------------------- --}}



            {{-- $asignaturas esta en el metodo render de la clase y es enviada aqui como un parametro --}}
            @if ($asignaturas->count())

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
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500"
                                {{-- aqui disparo "public function order($sort)" que esta en la clase --}} wire:click="order('dictado_id')">
                                Dictado

                                {{-- $sort --}}
                                @if ($sort == 'dictado_id')
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
                                {{-- aqui disparo "public function order($sort)" que esta en la clase --}} wire:click="order('carrera_id')">
                                Carrera

                                {{-- $sort --}}
                                @if ($sort == 'carrera_id')
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
                        @foreach ($asignaturas as $item)
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
                                <td class="px-6 py-3">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->dictado->nombre }}
                                    </div>
                                </td>
                                <td class="px-6 py-3">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->carrera->nombre }}
                                    </div>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium">

                                    {{-- aqui esta el boton editar que dispara el metodo edit y este muestra el modal --}}
                                    <a class="btn btn-blue-green px-2" wire:click="edit({{ $item->id }})">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-blue-green" wire:click="show({{ $item->id }})">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="py-4">
                    @if ($asignaturas->links())
                        {{ $asignaturas->links() }}
                    @endif

                </div>
            @else
                <div class="px-6 py-4">
                    No existen registros para mostrar
                </div>
            @endif

        </x-table>
    </div>




    {{-- ------------------------  DIALOG MODAL visualizado al precionar el boton editar --------------------------- --}}
    <x-dialog-modal wire:model="open_show">

        <x-slot name="title">
            {{-- Editando la Carrera: {{ $carreraEdit->nombre }} --}}
        </x-slot>


        <x-slot name="content">


            {{-- wire:model.defer le decimos a livewire que NO vuelva a renderizar el componente cada vez 
        que cambie la propiedad relacionada, sino que lo haga solo cuando se desencadene alguna accion  --}}
            <div class="mb-4">
                <x-label value="Nombre de la Carrera" />
                {{-- <x-input wire:model="carreraEdit.nombre" required type="text" class="w-full" />
                <x-input-error for='carreraEdit.nombre' /> --}}
            </div>
            <div class="mb-4">
                <x-label value="Codigo" />
                {{-- <x-input wire:model="carreraEdit.codigo" required type="text" class="w-full" />
                <x-input-error for='carreraEdit.codigo' /> --}}
            </div>

        </x-slot>


        <x-slot name="footer">
            <x-secondary-button class="mr-2" wire:click="$set('open_show', false)">
                Cancelar
            </x-secondary-button>

            <x-button wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar
            </x-button>
        </x-slot>

    </x-dialog-modal>


    {{-- ------------------------  DIALOG MODAL visualizado al precionar el boton editar --------------------------- --}}
</div>
