<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">


        <x-table>

            {{-- ------------------- Buscador de la tabla ------------------------------------------------------- --}}
            <div class="px-6 py-4 flex">
                <!-- input de jetstream utilizado para el buscador -->
                <x-input class="flex-1 mr-4" placeholder="Buscar evento" type="text" wire:model="search" />

                {{-- este es un componente hijo, tiene un boton y el formulario para crear una carrera --}}
                @livewire('create-evento')

            </div>
            {{-- ------------------- Buscador de la tabla ------------------------------------------------------- --}}

            @if ($eventos->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">

                        <tr>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500"
                                wire:click="order('nombre')">
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
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500">Turno
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500">Actividad
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500">Carrera
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500">Asignatura
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500"> Observación
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500">Acciones
                            </th>
                        </tr>


                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($eventos as $item)
                            <tr>
                                <td class="px-6 py-3">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->fecha }}
                                    </div>
                                </td>
                                <td class="px-6 py-3">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->turno->nombre }}
                                    </div>
                                </td>

                                <td class="px-6 py-3">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->actividad->nombre }}
                                    </div>
                                </td>
                                <td class="px-6 py-3">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->asignatura->carrera->nombre }}
                                    </div>
                                </td>
                                <td class="px-6 py-3">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->asignatura->nombre }}
                                    </div>
                                </td>
                                <td class="px-6 py-3">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->observacion }}
                                    </div>
                                </td>


                                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium">

                                    {{-- aqui esta el boton editar que dispara el metodo edit y este muestra el modal --}}
                                    <a class="btn btn-blue-green" wire:click="edit({{ $item->id }})">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-blue-green" wire:click="delete({{ $item->id }})">
                                        <i class="fa fa-trash"></i>
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


        {{-- ------------------------  DIALOG MODAL visualizado al precionar el boton editar --------------------------- --}}
        <form wire:submit="update">
            <x-dialog-modal wire:model="open_edit">

                <x-slot name="title">
                    Editando evento
                </x-slot>

                <x-slot name="content">

                    <div class="mt-4 grid">
                        <x-label value="Actividad" />
                        <select wire:model="actividad_id_edit"
                            class="flex-1 appearance-none border 
                                border-gray-300 
                                focus:border-indigo-500 
                                focus:ring-indigo-500 
                                rounded-md 
                                shadow-sm">
                            @foreach ($actividades as $actividad)
                                <option value="{{ $actividad->id }}">
                                    {{ $actividad->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('actividad_id_edit')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <fieldset>
                        <div class="mt-6 flex-1">
                            <x-label value="Carrera" />
                            <select wire:model.live="carrera_id"
                                class="mr-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                @foreach ($carreras as $carrera)
                                    <option value="{{ $carrera->id }}">
                                        {{ $carrera->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex space-x-4 mt-2">
                            @if ($carrera_id)
                                <div class="form-group ">
                                    <x-label value="Año" />
                                    <select wire:model="selectedCiclo"
                                        class="mr-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                        @foreach ($ciclos as $ciclo)
                                            <option value="{{ $ciclo }}">
                                                {{ $ciclo }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            @if ($selectedCiclo)
                                <div class="form-group">
                                    <x-label value="Asignatura" />
                                    <select wire:model="asignatura_id_edit"
                                        class="mr-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                        @foreach ($asignaturas as $asignatura)
                                            <option value="{{ $asignatura->id }}">
                                                {{ $asignatura->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    {{-- @error('asignatura_id_edit')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror --}}
                                    <x-input-error for="asignatura_id_edit"/>
                                </div>
                            @endif
                        </div>
                    </fieldset>

                    <div class=" mt-6 flex auto-rows-fr">
                        <div class="form-group flex-1">
                            <x-label value="Fecha" />
                            <input type="date" id="fecha" wire:model="fecha_edit"
                                class="form-control mr-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            {{-- @error('fecha_edit')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                            <x-input-error for="fecha_edit"/>
                        </div>

                        <div class="form-group">
                            <x-label value="Turno" />
                            <select wire:model.live="turno_id_edit"
                                class="mr-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                @foreach ($turnos as $turno)
                                    <option value="{{ $turno->id }}">
                                        {{ $turno->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('turno_id_edit')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mt-2">
                        <x-label value="Observación" />
                        <x-input wire:model="observacion_edit" type="text"
                            class="flex-1 mr-4 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                        @error('observacion_edit')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </x-slot>

                <x-slot name="footer">
                    <x-secondary-button class="mr-2" wire:click="$set('open_edit', false)">
                        Cancelar
                    </x-secondary-button>

                    <x-button wire:loading.attr="disabled" class="disabled:opacity-25">
                        Actualizar Evento
                    </x-button>
                </x-slot>

            </x-dialog-modal>
        </form>
    </div>


</div>
