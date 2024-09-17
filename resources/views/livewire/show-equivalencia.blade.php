<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">


        <x-table>

            {{-- ------------------- Filtros de la tabla ------------------------------------------------------- --}}
            <div class="px-6 py-4 flex">
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
                            {{ $ciclo }}
                        </option>
                    @endforeach
                </select>
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

                                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium">
                                    {{-- aqui esta el boton editar que dispara el metodo edit y este muestra el modal --}}
                                    <a class="btn btn-blue-green px-2" wire:click="edit({{ $item->id }})">
                                        <i class="fas fa-edit"></i>
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


        {{-- ------------------------  DIALOG MODAL visualizado al precionar el boton editar --------------------------- --}}

        <form wire:submit.prevent="update">
            <x-dialog-modal wire:model="open_edit">

                <x-slot name="title">
                    @if ($asignaturaEdit)
                        Editando Dictados Comunes de {{ $asignaturaEdit['codigo'] }} -
                        {{ $asignaturaEdit['nombre'] }}
                    @endif
                </x-slot>

                <x-slot name="content">
                    <div>
                        @if ($selectedAsignatura)
                            <h3>Asignatura seleccionada: {{ $selectedAsignatura->nombre }}</h3>
                            <div style="display: flex;">
                                <div style="margin-right: 20px; max-height: 50vh; overflow-y: auto;">
                                    <h4>Dictado Comun</h4>
                                    <ul>
                                        @foreach ($equivalentes as $equivalente)
                                            <li class="equivalente-item">
                                                <span>{{ $equivalente['nombre'] }}
                                                    ({{ $equivalente['codigo'] }})
                                                </span>
                                                <button wire:click="moverANoEquivalentes('{{ $equivalente['id'] }}')"
                                                    class="button-mover button-mover-no-equivalentes">></button>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div style="max-height: 50vh; overflow-y: auto;">
                                    <h4>Otras Asignaturas</h4>
                                    <ul>
                                        @foreach ($noEquivalentes as $noEquivalente)
                                            <li class="equivalente-item">
                                                <button wire:click="moverAEquivalentes('{{ $noEquivalente['id'] }}')"
                                                class="button-mover button-mover-equivalentes"><</button>
                                                <span>{{ $noEquivalente['nombre'] }}
                                                    ({{ $noEquivalente['codigo'] }})
                                                </span>
                                              
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
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

        <style>
            /* Alineación uniforme entre el texto y el botón */
            .equivalente-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px 0;
            }

            /* Estilo base para los botones */
            .button-mover {
                border: none;
                padding: 4px 5px;
                font-size: 16px;
                vertical-align: center;
                border-radius: 8px;
                color: white;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            /* Botón verde para mover a equivalentes */
            .button-mover-equivalentes {
                background-color: green;
            }

            .button-mover-equivalentes:hover {
                background-color: darkred;
            }

            /* Botón rojo para mover a no equivalentes */
            .button-mover-no-equivalentes {
                background-color: red;
            }

            .button-mover-no-equivalentes:hover {
                background-color: darkgreen;
            }
        </style>
        {{-- ------------------------  DIALOG MODAL visualizado al precionar el boton editar --------------------------- --}}

    </div>
