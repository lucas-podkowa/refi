<div>
    <x-danger-button wire:click="$set('open', true)">
        Crear Carrera
    </x-danger-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear nueva Carrera
        </x-slot>

        <x-slot name="content">
            {{-- wire:model.defer le decimos a livewire que NO vuelva a renderizar el componente cada vez 
            que cambie la propiedad relacionada, sino que lo haga solo cuando se desencadene alguna accion  --}}
            <div class="mb-4">
                <x-label value="Nombre"> </x-label>
                <x-input type="text" class="w-full" wire:model="nombre"> </x-input>
                <x-input-error for="nombre" />


            </div>
            <div class="mb-4">
                <x-label value="Codigo"> </x-label>
                <x-input type="text" class="w-full" wire:model="codigo"> </x-input>
                <x-input-error for="codigo" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mr-2" wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:click="save" wire:loading.remove wire:target="save">
                Crear
            </x-danger-button>

            <span wire:loading wire:target="save">Cargando ...</span>
        </x-slot>
    </x-dialog-modal>
</div>
