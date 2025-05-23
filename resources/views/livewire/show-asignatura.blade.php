<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <x-table>

            {{-- ------------------- Filtros de la tabla ------------------------------------------------------- --}}
            <div class="px-6 py-4 flex">
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
            {{-- ------------------- Filtros de la tabla ---------------------------------------------- --}}

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
                                    <a class="btn btn-blue-green px-2" href="#"
                                        wire:click="edit({{ $item->id }})">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-blue-green" href="#"
                                        wire:click="detail({{ $item->id }})">
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
                <fieldset>
                    <div class="mt-4 flex">
                        <!-- Contenedor para Nombre -->
                        <div class="flex-1 mr-3">
                            <x-label value="Nombre" />
                            <x-input wire:model.live="nombre_edit" type="text"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                            @error('nombre_edit')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Contenedor para Código -->
                        <div class="flex-3 ml-2">
                            <x-label value="Código" />
                            <x-input wire:model.live="codigo_edit" type="text"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                            @error('codigo_edit')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </fieldset>


                <fieldset>
                    <div class="mt-4 flex gap-2">
                        <!-- Contenedor para Carrera -->
                        <div class="flex-1 mr-3">
                            <x-label value="Carrera" />
                            <select wire:model.live="carrera_id_edit"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                @foreach ($carreras as $carrera)
                                    <option value="{{ $carrera->id }}">
                                        {{ $carrera->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Contenedor para Ciclo -->
                        <div class="flex-1 mr-2">
                            <x-label value="Año" />
                            <select wire:model.live="ciclo_edit"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                @foreach ($ciclos as $ciclo)
                                    <option value="{{ $ciclo }}">
                                        {{ $ciclo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Contenedor para Dictado -->
                        <div class="mr-2">
                            <x-label value="Dictado" />
                            <select wire:model.live="dictado_id_edit"
                                class="mr-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                @foreach ($dictados as $dictado)
                                    <option value="{{ $dictado->id }}">
                                        {{ $dictado->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                    </div>
                </fieldset>
                <div class="form-group mt-4">
                    <x-label value="Responsable" />
                    <x-input wire:model="responsable_edit" type="text"
                        class="flex-1 mr-4 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                    @error('responsable_edit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </x-slot>

            <x-slot name="footer">
                <x-secondary-button class="mr-2" wire:click="$set('open_edit', false)">
                    Cancelar
                </x-secondary-button>

                <x-button class="disabled:opacity-25">
                    Actualizar
                </x-button>
            </x-slot>

        </x-dialog-modal>
    </form>

    {{-- ------------------------  DIALOG MODAL visualizado al precionar el boton editar --------------------------- --}}

    {{-- ------------------------  DIALOG MODAL visualizado al precionar el boton detail (eye) --------------------------- --}}

    <x-dialog-modal wire:model="open_detail">

        <x-slot name="title" class="bg-gray-900">
            @if ($asignatura_selected)
                Próximos eventos relacionados con {{ $asignatura_selected->codigo }} -
                {{ $asignatura_selected->nombre }}
            @endif
        </x-slot>

        <x-slot name="content">

            <x-table>

                {{-- $carreras es esta en el metodo render de la clase y es enviada aqui como un parametro --}}
                @if (count($eventos_asignatura) > 0)
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">

                            <tr>
                                <th scope="col"
                                    class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500">
                                    Fecha
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

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @if (count($dictadosComunes) > 0)
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-blue-100">

                                <tr>
                                    <th scope="col"
                                        class="cursor-pointer px-6 py-3 text-right text-xs font-medium text-black">
                                        Asignaturas Equivalentes relacionadas al Evento
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($dictadosComunes as $dc)
                                    <tr>
                                        <td class="px-4 py-1">
                                            <div class="text-sm text-gray-900">
                                                {{ $dc->nombre }} ({{ $dc->codigo }} -
                                                {{ $dc->carrera->nombre }})
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    @endif
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
