<div>
    <x-danger-button wire:click="$set('open', true)">
        Crear Asignatura
    </x-danger-button>

    <form wire:submit="save">
        <x-dialog-modal wire:model="open">

            <x-slot name="title">
                Nueva Asignatura
            </x-slot>


            <x-slot name="content">
                <fieldset>
                    <div class="mt-4 flex">
                        <!-- Contenedor para Nombre -->
                        <div class="flex-1 mr-3">
                            <x-label value="Nombre" />
                            <x-input wire:model.live="nombre" type="text"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                            @error('nombre')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Contenedor para Código -->
                        <div class="flex-3 ml-2">
                            <x-label value="Código" />
                            <x-input wire:model.live="codigo" type="text"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                            @error('codigo')
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
                            <select wire:model.live="carrera_id"
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
                            <select wire:model.live="ciclo"
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
                            <select wire:model.live="dictado_id"
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




            </x-slot>

            <x-slot name="footer">
                <x-secondary-button class="mr-2" wire:click="$set('open', false)">
                    Cancelar
                </x-secondary-button>

                <x-button wire:loading.attr="disabled" class="disabled:opacity-25">
                    Crear Asignatura
                </x-button>
            </x-slot>

        </x-dialog-modal>
    </form>
</div>
