@extends('layouts.base')

@section('titulo', 'Reservas')

@section('contenido')
    <form action="{{route('mostrar_perfil')}}" method="get">
        <div class="form-group">
            <label><strong>ciudad de destino: </strong> Santiago </label>
        </div>
        <div class="form-group">
            <label><strong>fecha de inicio: </strong> 02/02/2012 </label>
        </div>
        <div class="form-group">
            <label><strong>fecha de término: </strong> 03/02/2012 </label>
        </div>
        <div class="form-group">
            <label><strong>cantidad máxima de pasajeros mayores: </strong> 20 </label>
        </div>
        <div class="form-group">
            <label><strong>cantidad máxima de pasajeros menores: </strong> 10 </label>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Volver</button>
        </div>
    </form>
@endsection
