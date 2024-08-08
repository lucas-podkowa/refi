<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="calendar"> </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            var etiquetas = @json($etiquetas);
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev, today',
                    center: 'title',
                    right: 'next'
                },
                events: etiquetas
            })
        });
    </script> 


</x-app-layout>
