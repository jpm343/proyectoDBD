@extends('layouts.base')

@section('titulo', 'Paquetes')

@section('contenido')
    <h3>Vuelos</h3>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Aerolínea</th>
                <th>Fecha salida</th>
                <th>Fecha llegada</th>
                <th>Aeropuerto origen</th>
                <th>Aeropuerto destino</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vuelos as $vuelo)
            <tr>
                <td>{{ $vuelo->nombre_aerolinea }}</td>
                <td>{{ $vuelo->fecha_salida }}</td>
                <td>{{ $vuelo->fecha_llegada }}</td>
                <td>{{ $vuelo->aeropuerto_origen }}</td>
                <td>{{ $vuelo->aeropuerto_destino }}</td>
                <td>
                    <form action="/buscar_paquetes/paso_2" method="post">
                        @csrf
                        <input type="hidden" name="id_vuelo" value="{{ $vuelo->id_vuelo }}">
                        <input type="hidden" name="tipo_paquete" value="{{ $request->tipo_paquete }}">
                        <input type="hidden" name="ciudad_destino" value="{{ $request->ciudad_destino }}">
                        <input type="hidden" name="fecha_inicio" value="{{ $request->fecha_inicio }}">
                        <input type="hidden" name="fecha_fin" value="{{ $request->fecha_fin }}">
                        <input type="hidden" name="num_personas" value="{{ $request->personas }}">
                        <input type="hidden" name="num_habitaciones" value="{{ $num_habitaciones }}">
                        <button type="submit" class="btn btn-default">Reservar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
