@extends('layouts.base')

@section('titulo', 'Traslados')

@section('contenido')
    <table class="table table-hover table-striped">
        <thead align="center">
            <th > Fecha y hora </th>
            <th > Origen </th>
            <th > Destino </th>
            <th > Cantidad de pasajeros </th>
            <th > Precio </th>
            <th colspan="1">&nbsp;</th>
        </thead>
        <tbody>
            @foreach($traslados as $Traslado)
            <tr>
                <td align="center">{{ $Traslado-> fecha_traslado}}</td>
                <td align="center">{{ $Traslado-> origen_traslado}}</td>
                <td align="center">{{ $Traslado-> destino_traslado}}</td>
                <td align="center">{{ $Traslado-> cantidad_pasajeros}}</td>
                <td align="center">${{ $Traslado-> precio_traslado}}</td>
                <td align="center">
                    <a href="{{route('Traslado.show', $Traslado->id_traslado)}}" class="btn btn-link" > ver </a> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
