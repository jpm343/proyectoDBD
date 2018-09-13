@extends('layouts.formulario')

@section('titulo', 'Traslados')

@section('contenido')
    <div clas="form">
        <br/>
        <br/>
        <label align="justify"> <strong>Fecha y hora del traslado:</strong> {{ $traslado-> fecha_traslado}} </label> 
        <br/>
        <label align="justify"> <strong>Punto de patida:</strong> {{ $traslado-> origen_traslado}} </label> 
        <br/>
        <label align="justify"> <strong>Punto de llegada:</strong> {{ $traslado-> destino_traslado}} </label> 
        <br/>
        <label align="justify"> <strong>Cantidad máxima de pasajeros:</strong> {{ $traslado-> cantidad_pasajeros}} </label>
        <br/> 
        <label align="justify"> <strong> Precio del traslado:</strong> ${{ $traslado-> precio_traslado}} </label> 
        <br/>
        <br/>
        <label align="justify"> <strong>Descripción del traslado</strong></label> 
        <p>{{ $traslado -> descripcion_traslado}}</p>
    </div>
    <br/>
    @if(Auth::user())
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <form action= "{{route('Traslado_reserva', $traslado->id_traslado)}}" method="GET">
                        <button class="btn btn-primary" align="right"> Agregar al carrito</button>
                    </form>    
                </div>
                <div class="col-md-2" align="left">
                    <form action= "{{route('Traslado.index')}}" method="GET">
                        <button class="btn btn-primary" align="right"> Buscar otro traslado</button>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="container">
        @include('Traslado_view.Traslado_fragment.Traslado-abrirSesion')
            <div class="row">
                <div class="col-md-2">
                    <form action= "{{route('Traslado.index')}}" method="GET">
                        <button class="btn" disabled="disabled" align="right"> Agregar al carrito </button>
                    </form>    
                </div>
                <div class="col-md-2" align="left">
                    <form action= "{{route('Traslado.index')}}" method="GET">
                        <button class="btn btn-primary" align="right"> Buscar otro traslado</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection
