@extends('layouts.app')

@section('breadcrumbs')
{{ Breadcrumbs::render('dispositivos.create') }}
@endsection



@section('content')
<form action="{{ route('dispositivos.store') }}" method="POST" id="formUser" autocomplete="off" >
    @csrf
    <div class="card">
       
        <div class="card-body row">
            <div class="fw-bold border-bottom pb-2 mb-3">COMPLETE DATOS</div>
            
            <div class="col-md-12 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph ph-article"></i>
                    </div>
                    <input name="nombre" value="{{ old('nombre') }}" type="text" class="form-control @error('nombre') is-invalid @enderror" required autofocus >
                    <label>Nombre de dispositivo<i class="text-danger">*</i></label>
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
                        <i class="ph ph-barcode"></i>
                    </div>
                    <input name="codigo" value="{{ old('codigo') }}" type="text" class="form-control @error('codigo') is-invalid @enderror" >
                    <label>Código</label>
                    @error('codigo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-6 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph ph-exam"></i>
                    </div>
                    <input name="valor" value="{{ old('valor') }}" type="text" class="form-control @error('valor') is-invalid @enderror" >
                    <label>Valor</label>
                    @error('valor')
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
                    <input name="bateria" value="{{ old('bateria') }}" type="text" class="form-control @error('bateria') is-invalid @enderror" >
                    <label>Batería</label>
                    @error('bateria')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-6 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph-toggle-left"></i>
                    </div>
                    <select class="form-select @error('estado') is-invalid @enderror" name="estado" required>
                        <option value=""></option>
                        <option value="ACTIVO" {{ old('estado')=='ACTIVO'?'selected':'' }}>ACTIVO</option>
                        <option value="INACTIVO" {{ old('estado')=='INACTIVO'?'selected':'' }}>INACTIVO</option>
                    </select>

                    <label>Estado<i class="text-danger">*</i></label>
                    @error('estado')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph ph-storefront"></i>
                    </div>
                    <select class="form-select @error('comercio_id') is-invalid @enderror" name="comercio_id" id="comercio_id" required>
                        <option value=""></option>
                        @foreach ($comercios as $comercio)
                            <option value="{{ $comercio->id }}"  {{ old('comercio_id')==$comercio->id?'selected':'' }} >{{ $comercio->nombre }}</option>
                        @endforeach
                    </select>

                    <label for="comercio_id">Comercio<i class="text-danger">*</i></label>
                    @error('comercio_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
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
