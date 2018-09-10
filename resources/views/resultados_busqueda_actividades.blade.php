@extends('layouts.base')

@section('titulo', 'Actividades')

@section('contenido')
    @if(isset($details))
    <p> Actividades disponibles en <b> {{ $query }} </b> :</p>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Ver Detalles</th>
                <th>Nombre</th>
                <th>Ciudad</th>
                <th>Pais</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $actividad)
                <tr>
                    <td><a href="/actividades_details/{{$actividad->id_actividad}}">Detalles</a></td>
                    <td>{{ $actividad->nombre_actividad }}</td>
                    <td>{{ $actividad->ciudad_actividad }}</td>
                    <td>{{ $actividad->pais_actividad }}</td>
                    <td>${{ $actividad->precio_actividad }} CLP</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @elseif(isset($message))
    <p>{{ $message }}</p>
    @endif
@endsection
