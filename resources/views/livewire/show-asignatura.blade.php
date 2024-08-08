<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <x-table>
            {{-- ------------------- Filtros de la tabla ------------------------------------------------------- --}}
            <div class="px-6 py-4 flex">
                <!-- input de jetstream utilizado para el buscador -->
                <x-input wire:model.live="search" placeholder="Nombre de Asignatura" type="text" class="flex-1 mr-4" />

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
                            {{ $ciclo }}
                        </option>
                    @endforeach
                </select>

                {{-- este es un componente hijo, tiene un boton y el formulario para crear una carrera --}}
                
                @livewire('create-asignatura')
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
                                    <a class="btn btn-blue-green" wire:click="detail({{ $item->id }})">
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

    <form wire:submit="update">
        <x-dialog-modal wire:model="open_edit">

            <x-slot name="title">
                @if ($asignaturaEdit)
                    Editando {{ $asignaturaEdit['codigo'] }} -
                    {{ $asignaturaEdit['nombre'] }}
                @endif
            </x-slot>


            <x-slot name="content">

                <div class="form-group mt-2">
                    <x-label value="nombre" />
                    <x-input wire:model="asignaturaEdit['nombre']" type="text"
                        class="flex-1 mr-4 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                    @error('nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <x-label value="codigo" />
                    <x-input wire:model="asignaturaEdit['codigo']" type="text"
                        class="flex-1 mr-4 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                    @error('codigo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4 grid">
                    <x-label value="Dictado" />
                    <select wire:model="asignaturaEdit['dictado_id']"
                        class="flex-1 appearance-none border 
                            border-gray-300 
                            focus:border-indigo-500 
                            focus:ring-indigo-500 
                            rounded-md 
                            shadow-sm">
                        @foreach ($dictados as $dictado)
                            <option value="{{ $dictado->id }}">
                                {{ $dictado->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('actividad_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex space-x-4 mt-2">
                    <div class="form-group ">
                        <x-label value="Año" />
                        <select wire:model.live="asignaturaEdit['ciclo']"
                            class="mr-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            @foreach ($ciclos as $ciclo)
                                <option value="{{ $ciclo }}">
                                    {{ $ciclo }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group mt-2">
                    <x-label value="Responsable" />
                    <x-input wire:model="asignaturaEdit['responsable']" type="text"
                        class="flex-1 mr-4 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                    @error('responsable')
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

    {{-- ------------------------  DIALOG MODAL visualizado al precionar el boton detail (eye) --------------------------- --}}

    <x-dialog-modal wire:model="open_detail">

        <x-slot name="title">
            @if ($asignatura_selected)
                Próximos eventos relacionados con {{ $asignatura_selected->codigo }} -
                {{ $asignatura_selected->nombre }}
            @endif
        </x-slot>

        <x-slot name="content">

            <x-table>

                {{-- $carreras es esta en el metodo render de la clase y es enviada aqui como un parametro --}}
                @if ($eventos_asignatura)
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">

                            <tr>
                                <th scope="col"
                                    class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500"
                                    {{-- aqui disparo "public function order($sort)" que esta en la clase --}} wire:click="order('nombre')">
                                    Fecha

                                    {{-- $sort es una propiedad de la clase --}}
                                    @if ($sort == 'fecha')
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
                                    class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500">
                                    Actividad
                                </th>
                                <th scope="col"
                                    class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500">
                                    Asignatura
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500">
                                    Responsable
                                </th>
                            </tr>


                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($eventos_asignatura as $evento)
                                <tr>
                                    <td class="px-4 py-3">
                                        <div class="text-sm text-gray-900">
                                            {{ $evento->fecha }} ({{ $evento->turno->nombre }})
                                        </div>
                                    </td>

                                    <td class="px-4 py-3">
                                        <div class="text-sm text-gray-900">
                                            {{ $evento->actividad->nombre }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="text-sm text-gray-900">
                                            {{ $evento->asignatura->codigo }} - {{ $evento->asignatura->nombre }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="text-sm text-gray-900">
                                            {{ $evento->asignatura->responsable }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-3 whitespace-nowrap text-sm font-medium">

                                        {{-- aqui esta el boton editar que dispara el metodo edit y este muestra el modal --}}
                                        {{-- <a class="btn btn-blue-green" wire:click="edit({{ $evento->evento_id }})">
                                            <i class="fas fa-edit"></i>
                                        </a> --}}

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

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mr-2" wire:click="$set('open_detail', false)">
                Volver
            </x-secondary-button>
        </x-slot>

    </x-dialog-modal>

    {{-- ------------------------  DIALOG MODAL visualizado al precionar el boton detail (eye) --------------------------- --}}
</div>
