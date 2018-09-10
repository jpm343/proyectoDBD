@extends('layouts.base')

@section('titulo', 'Alojamientos')

@section('contenido')
    @if(isset($details))
    <p> Resultados de Búsqueda:</p>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Ver Detalles</th>
                <th>Nombre</th>
                <th>Ciudad</th>
                <th>Descripcion</th>
                <th>Precio Por Noche Desde</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $alojamiento)
                <tr>
                    <td><a href="/alojamientos_detail/{{$alojamiento->id_hotel}}">Detalles</a></td>
                    <td>{{ $alojamiento->nombre_hotel }}</td>
                    <td>{{ $alojamiento->ciudad_hotel }}</td>
                    <td>{{ $alojamiento->descripcion_hotel }}</td>
                    <td>${{ $Arreglo[$alojamiento->id_hotel] }} CLP</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @elseif(isset($message))
    <p>{{ $message }}</p>
    @endif
@endsection
