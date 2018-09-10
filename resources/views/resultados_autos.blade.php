@extends('layouts.base')

@section('titulo', 'Autos')

@section('contenido')
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Patente</th>
                <th>Modelo</th>
                <th>Capacidad</th>
                <th>Transmisión</th>
                <th>Precio por día</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($autos as $auto)
            <tr>
                <td>{{ $auto->patente_auto }}</td>
                <td>{{ $auto->modelo_auto }}</td>
                <td>{{ $auto->capacidad_auto }} personas</td>
                <td>
                    @if ($auto->transmision_auto == 'A')
                    Automático
                    @else
                    Manual
                    @endif
                </td>
                <td>${{ $auto->precio_dia_auto }}</td>
                <td>{{ $auto->descripcion_auto }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
