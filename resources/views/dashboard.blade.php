<x-app-layout>
    <main class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="calendario"> </div>
        </div>

        <div class="modal fade" id="eventsModal" tabindex="-1" role="dialog" aria-labelledby="eventsModalLabel"
            aria-hidden="true">
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

    <script>
        $(document).ready(function() {
            var etiquetas = @json($etiquetas);
            $('#calendario').fullCalendar({
                locale: 'es',
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
                    $('#lista').append('<li><strong>Asignaturas:</strong> ' + event.asignatura +
                        '</li>');
                    $('#lista').append('<li><strong>Actividad:</strong> ' + event.actividad +
                        '</li>');
                    $('#lista').append('<li><strong>Dictados en Común:</strong> ' + (event
                        .dictado_comun ? event.dictado_comun : '-') + '</li>');
                    $('#lista').append('<li><strong>Fecha:</strong> ' + event.start.format(
                        'DD/MM/YYYY') + '</li>');
                    $('#lista').append('<li><strong>Observación:</strong> ' + event.observacion +
                        '</li>');
                    // Mostrar el modal
                    $('#eventsModal').modal('show');
                },

                // Estilos personalizados para los eventos
                eventRender: function(event, element) {
                    element.css('font-size', '16px');
                    element.css('border-radius', '5px');
                }

            });

            $('.fc-event').css('font-size', '18px');
            $('.fc-event').css('border-radius', '5px');
        });
    </script>
</x-app-layout>
