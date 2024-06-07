@extends('layouts.app')

@section('breadcrumbs')
{{ Breadcrumbs::render('home') }}
@endsection

@section('secondary-sidebar')
    @include('sections.secondary-sidebar')
@endsection

@section('content')

<div class="card">
    <div id="map" style="height: 480px; width: auto;"></div>
</div>


@endsection

@push('scripts')
<script>


    var comercios={{ Js::from($comercios) }};
    
    var map = L.map('map');
    var markers = []; // Array para almacenar los marcadores

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    function cargarComerciosEnMapa() {
        var bounds = [];

        comercios.forEach(function(comercio) {
            var marker = L.marker([comercio.latitud, comercio.longitud])
                .bindPopup('<b>' + comercio.nombre + '</b><br>' + comercio.direccion);
            markers.push(marker);
            bounds.push([comercio.latitud, comercio.longitud]);
        });

        map.fitBounds(bounds);
        markers.forEach(function(marker) {
            marker.addTo(map);
        });
    }

    // Función para centrar el mapa en un marcador específico por su ID con animación
    // Función para centrar el mapa en un marcador específico por su ID con animación
    function centrarEnMarcador(id) {
        var bounds = [];
        var markerFound = false;
        var markerPosition;

        comercios.forEach(function(comercio) {
            if (comercio.id == id) {
                markerPosition = [comercio.latitud, comercio.longitud];
                markerFound = true;
            }
        });

        if (markerFound) {
            // Animar el mapa hasta la posición del marcador con un nivel de zoom de 15
            map.flyTo(markerPosition, 18);

            // Animar el marcador específico
            markers.forEach(function(marker) {
                if (marker.getLatLng().equals(markerPosition)) {
                    marker.setOpacity(0).setOpacity(1, { duration: 500 }); // Animación de aparición
                    
                    marker.openPopup();
                }
            });
        } else {
            console.error('Marcador con ID ' + id + ' no encontrado.');
        }
    }




    function cargarComercios(search = '') {
        $.ajax({
            url: '{{ route('dispositivos.buscar') }}',
            type: 'GET',
            data: { search: search },
            success: function(data) {

                

                $('#comercios-list').empty();
                if (data.length > 0) {
                    data.forEach(function(item) {
                        // console.log(item.dispositivo.codigo)

                        $('#comercios-list').append(
                            `<a href="#" onclick="event.preventDefault(); centrarEnMarcador(${item.comercio.id})" data-nombre="${item.comercio.nombre}" data-latitud="${item.comercio.latitud}" data-longitud="${item.comercio.longitud}"  style="color: inherit; text-decoration: none;" id="id-dispositivo-${item.dispositivo.id}">
                                <div class="d-flex mb-3 border-bottom">
                                    <div class="me-2">
                                        <img src="${item.comercio.foto}" width="36" height="36" class="rounded-pill" alt="">
                                    </div>
                                    <div class="flex-fill">
                                        <div class="fw-semibold text-primary">${item.dispositivo.codigo} ${item.dispositivo.nombre}</div>
                                        <div class="fs-sm opacity-30">${item.comercio.nombre}</div>
                                        <smal class="fs-sm opacity-50">${item.comercio.user_nombre}</small>
                                    </div>
                                    <div class="ms-3 align-self-center">
                                        <span class="badge bg-danger rounded-pill ms-auto" id="contador-notificacion-dispositivo-id-${item.dispositivo.id}">${item.dispositivo.contador_notificaciones}</span>
                                    </div>
                                </div>
                            </a>
                            `
                        );
                    });
                } else {
                    $('#comercios-list').append('<p>No se encontraron resultados</p>');
                }
            }
        });
    }

    // Manejar el evento de búsqueda
    $('#buscar-comercios').on('input', function() {
        var search = $(this).val();
        cargarComercios(search);
    });

    $(document).ready(function() {
        
        // Cargar los primeros 15 registros al cargar la página
        cargarComercios();
        cargarComerciosEnMapa();
        
    });
</script>
@endpush
