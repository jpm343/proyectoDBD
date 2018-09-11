@extends('layouts.base')

@if (isset($request->tipo_paquete))
    @section('titulo', 'Paquetes')
@else
    @section('titulo', 'Autos')
@endif

@section('contenido')
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Patente</th>
                <th>Modelo</th>
                <th>Compañía</th>
                <th>Capacidad</th>
                <th>Transmisión</th>
                <th>Precio por día</th>
                <th>Descripción</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($autos as $auto)
            <tr>
                <td>{{ $auto->patente_auto }}</td>
                <td>{{ $auto->modelo_auto }}</td>
                <td>{{ $auto->compania_auto }}</td>
                <td>{{ $auto->capacidad_auto }} personas</td>
                <td>
                    @if ($auto->transmision_auto == 'A')
                    Automático
                    @else
                    Manual
                    @endif
                </td>
                <td>${{ $auto->precio_dia_auto }} CLP</td>
                <td>{{ $auto->descripcion_auto }}</td>
                <td>
                    <form action="/autos/reservar" method="post">
                        @csrf
                        <input type="hidden" name="patente" value="{{ $auto->patente_auto }}">
                        <input type="hidden" name="ciudad_arriendo" value="{{ $request->ciudad_inicio }}">
                        <input type="hidden" name="ciudad_devolucion" value="{{ $request->ciudad_fin }}">
                        <input type="hidden" name="fecha_inicio" value="{{ $request->fecha_inicio }}">
                        <input type="hidden" name="fecha_fin" value="{{ $request->fecha_fin }}">
                        <button type="submit" class="btn btn-default">Reservar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
