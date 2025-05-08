<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>REFI</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- for Calendar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/locale/es.js"></script>


    <!-- for bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <!-- Styles -->
    @vite('resources/css/app.css')

    <!-- Estilos del Calendario -->
    <style>
        body {
            margin: 0;
            line-height: inherit;
            background-image: url('{{ asset('/logos/fondo_lineas.jpg') }}');
            /* background: rgb(175, 179, 182); */
            /* background: linear-gradient(180deg, rgba(175, 179, 182, 1) 0%, rgba(255, 255, 255, 1) 100%); */
        }

        .fc td {
            border-width: 3px;
            border-style: double;
            border-color: #ffffff;
        }

        .fc-day-grid .fc-row {
            height: 128px !important;
        }

        .fc-scroller.fc-day-grid-container {
            height: 768px !important;
            overflow: hidden;
        }


        .fc-head {
            background-color: #888;
            border-style: none;
            color: white;
            font-size: 1.2rem;
            text-shadow: 0px 0px 3px black
        }

        .fc-view-container {
            box-shadow: 1pc 1pc 10px #888
        }

        .fc-center {
            text-transform: capitalize;
            color: white;
            font-size: 1.5rem;
            text-shadow: 0px 0px 3px black
        }

        .nav_superior {
            display: flex;
            justify-content: space-between;
        }

        .nav_superior .enlace {
            color: #444;
            font-size: 1.2rem;
            padding: 0.5rem 1rem;
            margin-right: 1rem;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
            cursor: pointer;
            background-color: transparent;
            font-weight: 700;
            text-decoration: none;
            border-radius: 0.5rem;
            box-shadow: 0px 0px 10px 10px #ccc;
        }

        .nav_superior .enlace:hover {
            transition: all 0.5s ease-in-out;
            box-shadow: 5px 5px 4px 4px #999;
            /* box-shadow: 0px 0px 20px 20px #bbb; */
            transform: scale(1.1);

        }
    </style>

    <!-- Estilos del Pop-UP -->
    <style>
        .personalizado {
            background-color: aliceblue;
            margin-top: 25vh;
            background: linear-gradient(rgb(97, 179, 255), white);
            box-shadow: 0px -10px 30px 5px whitesmoke;
            border-radius: 1rem;
            transition: all 0.5s ease-in-out;
        }

        .personalizado:hover {
            border-radius: 2rem;
            box-shadow: 0px 20px 30px 5px black;
            transform: scale(1.1);
        }

        #eventsModalLabel {
            font-size: 1.5rem;
            font-weight: 600;
            text-align: center;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="relative min-h-screen flex flex-col items-center selection:bg-[#FF2D20] selection:text-white">
        <div class="fondo relative w-full max-w-2xl px-6 lg:max-w-7xl">

            <header class="nav_superior py-4">
                <!-- Logo a la izquierda -->
                <div class="flex-shrink-0">
                    <img src="{{ asset('/logos/logo_50.png') }}" style="width: 300px; height: auto;" alt="Logo">
                </div>
                <select id="filtroCiclo"
                    class="flex-1 mx-4 my-2  border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="">Todos los Ciclos</option>
                    @foreach ($ciclos as $ciclo)
                        <option value="{{ $ciclo }}">{{ $ciclo }}º Año</option>
                    @endforeach
                </select>
                <select id="filtroCarrera" class="mr-4 my-2 border-gray-300 rounded-md shadow-sm">
                    <option value="">Todas las Carreras</option>
                    @foreach ($carreras as $carrera)
                        <option value="{{ $carrera }}">{{ $carrera }}</option>
                    @endforeach
                </select>
                <div>
                    @if (Route::has('login'))
                        <!-- Enlaces a la derecha -->
                        <nav class="flex ">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="rounded-md px-3 py-2 text-black transition hover:text-black/70 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-[#FF2D20]">
                                    Panel de Control
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="enlace my-2">
                                    Iniciar Sesión
                                </a>

                                {{-- @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="enlace">
                                        Registrarse
                                    </a>
                                @endif --}}
                            @endauth
                        </nav>
                    @endif
                </div>

            </header>

            <main>
                <div class="flex">
                    <div id="calendar"> </div>
                </div>

                <div class="modal fade" id="eventsModal" tabindex="-1" role="dialog"
                    aria-labelledby="eventsModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content personalizado">
                            <div class="modal-header">
                                <h5 class="modal-title" id="eventsModalLabel">Detalles del Evento</h5>
                            </div>
                            <div class="modal-body">
                                <ul id="eventsList"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>




    {{-- logica del calendario --}}
    <script>
        $(document).ready(function() {
            var etiquetas = @json($etiquetas);

            function actualizarCalendario(filtroCiclo, filtroCarrera) {
                var eventosFiltrados = etiquetas.filter(evento => {
                    var coincideCiclo = filtroCiclo === "" || String(evento.ciclo) === String(filtroCiclo);
                    var coincideCarrera = filtroCarrera === "" || evento.dictado_comun.includes(
                        filtroCarrera);

                    return coincideCiclo && coincideCarrera;
                });

                $('#calendar').fullCalendar('removeEvents');
                $('#calendar').fullCalendar('addEventSource', eventosFiltrados);
                $('#calendar').fullCalendar('rerenderEvents');
            }

            $('#calendar').fullCalendar({
                locale: 'es',
                header: {
                    left: 'prev, today',
                    center: 'title',
                    right: 'next'
                },
                events: etiquetas,
                eventClick: function(event, jsEvent, view) {
                    // Limpiar el contenido anterior del modal
                    $('#eventsList').empty();

                    // Agregar detalles del evento al modal
                    $('#eventsList').append('<li><strong>Asignaturas:</strong> ' + event.asignatura +
                        '</li>');
                    $('#eventsList').append('<li><strong>Actividad:</strong> ' + event.actividad +
                        '</li>');
                    $('#eventsList').append('<li><strong>Dictados en Común:</strong> ' + (event
                        .dictado_comun ? event.dictado_comun : '-') + '</li>');
                    $('#eventsList').append('<li><strong>Fecha:</strong> ' + event.start.format(
                        'DD/MM/YYYY') + '</li>');
                    $('#eventsList').append('<li><strong>Observación:</strong> ' + event.observacion +
                        '</li>');

                    // Mostrar el modal
                    $('#eventsModal').modal('show');
                },

                eventRender: function(event, element) {
                    element.css('font-size', '20px');
                    element.css('border-radius', '5px');
                    element.css('padding-left', '5px');
                    element.css('line-height', '1.1');
                    element.css({
                        'white-space': 'normal',
                        'word-wrap': 'break-word'
                    });
                    element.find('.fc-title').html(event.title.replace(/\n/g, '<br/>'));
                }
            });

            // Detectar cambios en los filtros
            $('#filtroCiclo, #filtroCarrera').change(function() {
                var filtroCiclo = $('#filtroCiclo').val();
                var filtroCarrera = $('#filtroCarrera').val();
                actualizarCalendario(filtroCiclo, filtroCarrera);
            });
        });
    </script>

</body>

</html>
