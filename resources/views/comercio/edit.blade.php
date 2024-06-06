@extends('layouts.app')

@section('breadcrumbs')
{{ Breadcrumbs::render('comercios.edit',$comercio) }}
@endsection



@section('content')
<form action="{{ route('comercios.update',$comercio) }}" method="POST" id="formUser" enctype="multipart/form-data" autocomplete="off" >
    @csrf
    @method('put')
    <div class="card">
       
        <div class="card-body row">
            <div class="fw-bold border-bottom pb-2 mb-3">COMPLETE DATOS</div>
            
            <div class="col-md-12 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph ph-map-pin"></i>
                    </div>
                    <input name="nombre" value="{{ old('nombre',$comercio->nombre) }}" type="text" class="form-control @error('nombre') is-invalid @enderror" required autofocus >
                    <label>Nombre de comercio<i class="text-danger">*</i></label>
                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph ph-article"></i>
                    </div>
                    <input name="descripcion" value="{{ old('descripcion',$comercio->descripcion) }}" type="text" class="form-control @error('descripcion') is-invalid @enderror" >
                    <label>Descripción</label>
                    @error('descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-6 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph ph-map-pin"></i>
                    </div>
                    <input name="direccion" value="{{ old('direccion',$comercio->direccion) }}" type="text" class="form-control @error('direccion') is-invalid @enderror" >
                    <label>Dirección</label>
                    @error('direccion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
          
            <div class="col-md-6 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph ph-device-mobile"></i>
                    </div>
                    <input name="numero_celular" value="{{ old('numero_celular',$comercio->numero_celular) }}" type="text" class="form-control @error('numero_celular') is-invalid @enderror" >
                    <label>Número celular</label>
                    @error('numero_celular')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-6 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph ph-bell"></i>
                    </div>
                    <input name="alarma_comunitaria_id" value="{{ old('alarma_comunitaria_id',$comercio->alarma_comunitaria_id) }}" type="text" class="form-control @error('alarma_comunitaria_id') is-invalid @enderror" >
                    <label>Alarma comunitaria Id</label>
                    @error('alarma_comunitaria_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph ph-user"></i>
                    </div>
                    <select class="form-select @error('user_id') is-invalid @enderror" name="user_id" id="user_id" required>
                        <option value=""></option>
                        @foreach ($usuarios as $user)
                            <option value="{{ $user->id }}"  {{ old('user_id',$comercio->user_id)==$user->id?'selected':'' }} >{{ $user->name }}</option>
                        @endforeach
                    </select>

                    <label for="user_id">Usuario<i class="text-danger">*</i></label>
                    @error('user_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-3 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph-toggle-left"></i>
                    </div>
                    <select class="form-select @error('estado') is-invalid @enderror" name="estado" required>
                        <option value=""></option>
                        <option value="ACTIVO" {{ old('estado',$comercio->estado)=='ACTIVO'?'selected':'' }}>ACTIVO</option>
                        <option value="INACTIVO" {{ old('estado',$comercio->estado)=='INACTIVO'?'selected':'' }}>INACTIVO</option>
                    </select>

                    <label>Estado<i class="text-danger">*</i></label>
                    @error('estado')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            

            <div class="col-md-3 mb-1">
                <input type="file" class="form-control" name="foto" accept="image/*">
                <div class="form-text">Foto, acepata solo imagenes.</div>
                @if (Storage::exists($comercio->foto))
                <a href="{{ route('comercios.descargarFoto',$comercio->id) }}">
                    <img src="{{ route('comercios.verFoto',$comercio->id) }}" alt="" width="45">
                </a>
                @endif
            </div>

            <div class="col-lg-12">
                <h2>Ubicación del comercio</h2>
                <div id="map"></div>
                <input type="hidden" name="latitud" value="-0.9447814006873896" id="latitude">
                <input type="hidden" name="longitud" value="-78.62915039062501" id="longitude">
            </div>
           
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</form>



@endsection


@push('scriptsHeader')
<style>
    #map { height: 480px; }
</style>
@endpush
@push('scripts')
<script>

    $('#formUser').validate();

    $(document).ready(function () {

        
        var coordenadas=[$('#latitude').val(), $('#longitude').val()];

        var map = L.map('map').setView(coordenadas, 8);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        var market=L.marker(coordenadas,{
            title:'Ubicación de gateway',
            draggable:true
        }).addTo(map);

        market.on('dragend', function(event) {
            var marker = event.target;
            var position = marker.getLatLng();
            $('#latitude').val(position.lat);
            $('#longitude').val(position.lng);
            
        });
    });
 </script>
@endpush
