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
    <form action= "{{route('Traslado.index')}}" method="GET">
        <button class="btn btn-primary" align="right"> Agregar al carrito</button>
        <button class="btn btn-primary" align="right"> Buscar otro traslado</button>
    </form>
@endsection
