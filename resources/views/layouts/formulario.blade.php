@extends('layouts.base')

@section('contenido')
    <div class="row align-items-center">
        <div class="col-8">
            @include('carousel.carousel')
        </div>
        <div class="col-4">
            @yield('formulario')
        </div>
    </div>
@endsection
