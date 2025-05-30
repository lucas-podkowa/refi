<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">


        <x-table>

            {{-- ------------------- Buscador de la tabla ------------------------------------------------------- --}}
            <div class="px-6 py-4 flex">
                <!-- input de jetstream utilizado para el buscador -->
                <x-input class="flex-1 mr-4" placeholder="Buscar evento por asignatura y observación" type="text"
                    wire:model.live="search" />

                {{-- este es un componente hijo, tiene un boton y el formulario para crear una carrera --}}
                @livewire('create-evento')

            </div>
            {{-- ------------------- Buscador de la tabla ------------------------------------------------------- --}}

            @if ($eventos->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">

                        <tr>
                            <th scope="col"
                                class="cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500"
                                wire:click="order('fecha')">
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
                                class="cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500">Turno
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500">Actividad
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500">Carrera
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500">Asignatura
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500">
                                Observación
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500">Acciones
                            </th>
                        </tr>


                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($eventos as $item)
                            <tr>
                                <td class="px-4 py-2">
                                    <div class="text-sm text-gray-900">
                                        {{-- {{ $item->fecha }} --}}
                                        {{ \Carbon\Carbon::parse($item->fecha)->format('d/m/Y') }}
                                    </div>
                                </td>
                                <td class="px-4 py-2">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->turno->nombre }}
                                    </div>
                                </td>

                                <td class="px-4 py-2">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->actividad->nombre }}
                                    </div>
                                </td>
                                <td class="px-4 py-2">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->asignatura->carrera->nombre }}
                                    </div>
                                </td>
                                <td class="px-4 py-2">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->asignatura->nombre }}
                                    </div>
                                </td>
                                <td class="px-4 py-2">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->observacion }}
                                    </div>
                                </td>

                                <td class="px-4 py-2 whitespace-nowrap text-sm font-medium">
                                    @if (auth()->user()->hasRole('Administrador') || auth()->user()->id == $item->user_id)
                                        <a class="btn btn-blue-green" href="#"
                                            wire:click="edit({{ $item->id }})">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a class="btn btn-blue-green" href="#"
                                            onclick="confirmDeletion({{ $item->id }})">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    @endif
                                <td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{-- Paginación --}}
                <div class="px-6 py-3">
                    {{ $eventos->links() }}
                </div>
            @else
                <div class="px-6 py-4">
                    No existen registros para mostrar
                </div>
            @endif

        </x-table>
        <script>
            //script para el boton de eliminar
            function confirmDeletion(eventoId) {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.delete(eventoId); //funcion en la clase ShowEvento.php
                        Swal.fire({
                            timer: 2000,
                            position: "bottom-end",
                            icon: "info",
                            title: "Eliminado",
                            text: "Evento eliminado con exito",
                            showConfirmButton: false
                        });
                    }
                })
            }
        </script>

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
                                    <x-input-error for="asignatura_id_edit" />
                                </div>
                            @endif
                        </div>
                    </fieldset>

                    <div class=" mt-6 flex auto-rows-fr">
                        <div class="form-group flex-1">
                            <x-label value="Fecha" />
                            <input type="date" id="fecha" wire:model="fecha_edit"
                                min="{{ now()->toDateString() }}"
                                class="form-control mr-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            {{-- @error('fecha_edit')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                            <x-input-error for="fecha_edit" />
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
