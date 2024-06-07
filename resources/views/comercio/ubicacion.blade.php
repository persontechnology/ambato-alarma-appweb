@if ($comercio->latitud && $comercio->longitud)
        
    <a href="#" title="Ver ubicación" data-nombre="{{ $comercio->nombre }}" data-latitud="{{ $comercio->latitud }}" data-longitud="{{ $comercio->longitud }}" onclick="event.preventDefault(); verUbicacion(this)" class="dropdown-item">
        <i class="ph ph-map-pin"></i>
    </a>
@endif