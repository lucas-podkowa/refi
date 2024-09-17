<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <main class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="calendario"> </div>
        </div>

        <div class="modal fade" id="eventsModal" tabindex="-1" role="dialog"
            aria-labelledby="eventsModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content personalizado">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventsModalLabel">Detalles del Evento</h5>
                    </div>
                    <div class="modal-body">
                        <!-- Aquí se mostrarán los detalles del evento -->
                        <ul id="lista"></ul>
                    </div>
                </div>
            </div>
        </div>


    </main>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="calendar"> </div>
        </div>
    </div> --}}

    {{-- <script>
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
    </script>  --}}

<script>
    $(document).ready(function() {
        var etiquetas = @json($etiquetas);
        $('#calendario').fullCalendar({
            header: {
                left: 'prev, today',
                center: 'title',
                right: 'next'
            },
            events: etiquetas,

            eventClick: function(event, jsEvent, view) {
                // Limpiar el contenido anterior del modal
                $('#lista').empty(); 

                // Agregar detalles del evento al modal
                $('#lista').append('<li><strong>Asignatura:</strong> ' + event.title +
                '</li>');
                $('#lista').append('<li><strong>Responsable:</strong> ' + (event.responsable ?
                    event.responsable : '-') + '</li>');
                $('#lista').append('<li><strong>Fecha:</strong> ' + event.start.format(
                    'YYYY-MM-DD') + '</li>');
                $('#lista').append('<li><strong>Observación:</strong> ' + event.observacion +
                    '</li>');


                // Mostrar el modal
                $('#eventsModal').modal('show');
            },

            // Estilos personalizados para los eventos
            eventRender: function(event, element) {
                element.css('font-size', '20px');
                element.css('border-radius', '10px');
            }

        });

        $('.fc-event').css('font-size', '20px');
        $('.fc-event').css('border-radius', '10px');
    });
</script>
</x-app-layout>
