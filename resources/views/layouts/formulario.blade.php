@extends('layouts.base')

@section('contenido')
    <div class="row align-items-center">
        <div class="col-8">
            @include('carousel.carousel')
        </div>
        <div class="col-4 formulario">
            @foreach ($errors->all() as $mensaje)
            <span class="error">{{ _($mensaje) }}</span><br />
            @endforeach
            @yield('formulario')
        </div>
    </div>
@endsection
