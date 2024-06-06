@extends('layouts.app')

@section('breadcrumbs')
{{ Breadcrumbs::render('lecturas.edit',$lectura) }}
@endsection



@section('content')
<form action="{{ route('lecturas.update',$lectura) }}" method="POST" id="formUser" autocomplete="off" >
    @csrf
    @method('put')
    <div class="card">
       
        <div class="card-body row">
            <div class="fw-bold border-bottom pb-2 mb-3">COMPLETE DATOS</div>
            
     

         
            
            <div class="col-md-6 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph ph-exam"></i>
                    </div>
                    <input name="valor" value="{{ old('valor',$lectura->valor) }}" type="text" class="form-control @error('valor') is-invalid @enderror" >
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
                    <input name="bateria" value="{{ old('bateria',$lectura->bateria) }}" type="text" class="form-control @error('bateria') is-invalid @enderror" >
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
                    <select class="form-select @error('visto') is-invalid @enderror" name="estado" required>
                        <option value=""></option>
                        <option value="0" {{ old('visto',$lectura->visto)===0?'selected':'' }}>NO</option>
                        <option value="1" {{ old('visto',$lectura->visto)===1?'selected':'' }}>SI</option>
                    </select>

                    <label>Visto<i class="text-danger">*</i></label>
                    @error('visto')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph ph-storefront"></i>
                    </div>
                    <select class="form-select @error('dispositivo_id') is-invalid @enderror" name="dispositivo_id" id="dispositivo_id" required>
                        <option value=""></option>
                        @foreach ($dispositivos as $dispositivo)
                            <option value="{{ $dispositivo->id }}"  {{ old('dispositivo_id',$lectura->dispositivo_id)==$dispositivo->id?'selected':'' }} >{{ $dispositivo->nombre }}</option>
                        @endforeach
                    </select>

                    <label for="dispositivo_id">Dispositivo <i class="text-danger">*</i></label>
                    @error('dispositivo_id')
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
