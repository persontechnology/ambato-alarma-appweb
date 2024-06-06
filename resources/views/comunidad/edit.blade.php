@extends('layouts.app')

@section('breadcrumbs')
{{ Breadcrumbs::render('comunidad.edit',$comunidad) }}
@endsection



@section('content')
<form action="{{ route('comunidad.update',$comunidad) }}" method="POST" id="formUser" autocomplete="off">
    @csrf
    @method('PUT')
    <div class="card">
       
        <div class="card-body row">
            <div class="fw-bold border-bottom pb-2 mb-3">COMPLETE DATOS</div>
            
            <div class="col-md-6 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph ph-map-pin"></i>
                    </div>
                    <input name="nombre" value="{{ old('nombre',$comunidad->nombre) }}" type="text" class="form-control @error('nombre') is-invalid @enderror" required >
                    <label>Nombre de comunidad<i class="text-danger">*</i></label>
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
                        <i class="ph ph-whatsapp-logo"></i>
                    </div>
                    <input name="grupo_whatsapp" value="{{ old('grupo_whatsapp',$comunidad->grupo_whatsapp) }}" type="text" class="form-control @error('grupo_whatsapp') is-invalid @enderror" >
                    <label>Grupo de whatsApp</label>
                    @error('grupo_whatsapp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-6 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph ph-telegram-logo"></i>
                    </div>
                    <input name="grupo_telegram" value="{{ old('grupo_telegram',$comunidad->grupo_telegram) }}" type="text" class="form-control @error('grupo_telegram') is-invalid @enderror" >
                    <label>Grupo de telegram</label>
                    @error('grupo_telegram')
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



@push('scripts')
    <script>
   
        $('#formUser').validate();
         
    </script>
@endpush
@endsection
