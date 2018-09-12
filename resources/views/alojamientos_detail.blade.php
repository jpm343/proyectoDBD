@extends('layouts.base')

@section('titulo', 'Alojamientos')

@section('contenido')
    <div class="row align-items-center">
        <div class="col-lg-6 md-6 xs-12">
            <h1> {{ $hotel->nombre_hotel }} </h1>
            <h3> Puntacion: {{ $hotel->puntuacion_hotel }} </h3>
            <h5> Descripción: {{ $hotel->descripcion_hotel }}</h5>
            <br>
        </div>
        <div class="col-lg-6 md-6 xs-12">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th></th>
                    <th>N° Habitacion</th>
                    <th>Capacidad Habitacion</th>
                    <th>Tipo Habitacion</th>
                    <th>Precio Por Noche</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $detail)
                    <tr>
                        <td>HABITACION</td>
                        <td>{{ $detail->numero_habitacion }}</td>
                        <td>{{ $detail->capacidad_habitacion }}</td>
                        <td>{{ $detail->tipo_habitacion }}</td>
                        <td>{{ $detail->precio_noche_habitacion }}</td>
                        <td><a class="btn btn-default" type="button" href="{{ route('alojamiento.addToCart', ['id' => $detail->id_habitacion]) }}">Comprar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
