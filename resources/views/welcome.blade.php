@extends('layouts.app')

@section('breadcrumbs')
{{ Breadcrumbs::render('home') }}
@endsection

@section('secondary-sidebar')
    @include('sections.secondary-sidebar')
@endsection

@section('content')

<!-- Content area -->
<div class="content d-flex justify-content-center align-items-center">

    <!-- Login form -->
    <form class="login-form" action="index.html">
        <div class="card mb-0">
            <div class="card-body">
                <div class="text-center mb-3">
                    <div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
                        <img src="{{ asset('assets/images/logo_icon_azul.svg') }}" class="h-48px" alt="">
                    </div>
                    <h5 class="mb-0">{{ config('app.name') }}</h5>
                    <span class="d-block text-muted">SISTEMA DE ALARMA</span>
                    <small>V.1.0</small>
                </div>

                
            </div>
        </div>
    </form>
    <!-- /login form -->

</div>
<!-- /content area -->



@endsection