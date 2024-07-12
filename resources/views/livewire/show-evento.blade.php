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



            {{-- $carreras es esta en el metodo render de la clase y es enviada aqui como un parametro --}}
            @if ($eventos->count())
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
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500"> Acciones
                            </th>
                            <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500">Observación
                        </th>
                        </tr>


                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($eventos as $evento)
                            <tr>
                                <td class="px-6 py-3">
                                    <div class="text-sm text-gray-900">
                                        {{ $evento->fecha }}
                                    </div>
                                </td>
                                <td class="px-6 py-3">
                                    <div class="text-sm text-gray-900">
                                        {{ $evento->turno->nombre }}
                                    </div>
                                </td>

                                <td class="px-6 py-3">
                                    <div class="text-sm text-gray-900">
                                        {{ $evento->actividad->nombre }}
                                    </div>
                                </td>
                                <td class="px-6 py-3">
                                    <div class="text-sm text-gray-900">
                                        {{ $evento->asignatura->carrera->nombre }}
                                    </div>
                                </td>
                                <td class="px-6 py-3">
                                    <div class="text-sm text-gray-900">
                                        {{ $evento->asignatura->nombre }} 
                                    </div>
                                </td>
                                <td class="px-6 py-3">
                                    <div class="text-sm text-gray-900">
                                        {{ $evento->observacion }}
                                    </div>
                                </td>


                                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium">

                                    {{-- aqui esta el boton editar que dispara el metodo edit y este muestra el modal --}}
                                    <a class="btn btn-blue-green" wire:click="edit({{ $evento->evento_id }})">
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


</div>
