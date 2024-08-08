<div>
    <x-danger-button wire:click="$set('open', true)">
        Crear Evento
    </x-danger-button>

    <form wire:submit="save">
        <x-dialog-modal wire:model="open">

            <x-slot name="title">
                Nuevo Registro
                {{-- Editando la Carrera: {{ $carreraEdit->nombre }} --}}
            </x-slot>


            <x-slot name="content">

                <fieldset>
                    <div class="mt-4 grid">
                        <x-label value="Actividad" />
                        <select 
                        wire:model.live="actividad_id"
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
                        {{-- @error('actividad_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror --}}
                    </div>
                </fieldset>

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
                                <select wire:model.live="selectedCiclo"
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
                                <select wire:model.live="asignatura_id"
                                    class="mr-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    @foreach ($asignaturas as $asignatura)
                                        <option value="{{ $asignatura->id }}">
                                            {{ $asignatura->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('asignatura_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif
                    </div>
                </fieldset>

                <div class=" mt-6 flex auto-rows-fr">
                    <div class="form-group flex-1">
                        <x-label value="Fecha" />
                        <input type="date" id="fecha" wire:model.live="fecha"
                            class="form-control mr-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        @error('fecha')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <x-label value="Turno" />
                        <select wire:model.live="turno_id"
                            class="mr-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            @foreach ($turnos as $turno)
                                <option value="{{ $turno->id }}">
                                    {{ $turno->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('turno_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mt-2">
                    <x-label value="Observación" />
                    <x-input wire:model.live="observacion" type="text"
                        class="flex-1 mr-4 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                    @error('observacion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button class="mr-2" wire:click="$set('open', false)">
                    Cancelar
                </x-secondary-button>

                <x-button wire:loading.attr="disabled" class="disabled:opacity-25">
                    Crear Evento
                </x-button>
            </x-slot>

        </x-dialog-modal>
    </form>
</div>