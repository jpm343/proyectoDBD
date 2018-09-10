@extends('layouts.base')

@section('titulo', 'Vuelos')

@section('contenido')
    @if(isset($vuelosI))
    <table class="table table-stripped">
        <thead>
            <tr><th>Destino</th>
                <th>Fecha salida</th>
                <th>Maletas por adulto permitidas</th>
                <th>Pais origen</th>
                <th>Aeropuerto origen</th>
                <th>Pais destino</th>
                <th>Aeropuerto destino</th>
                <th>Nombre aerolinea</th>
                <th>Precio CLP</th>
                <th>Comprar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vuelosI as $vuelos)
                <tr>
                    <td>IDA</td>
                    <td>{{$vuelos->fecha_salida}}</td>
                    <td>{{$vuelos->equipaje}}</td>
                    <td>{{$vuelos->pais_origen}}</td>
                    <td>{{$vuelos->aeropuerto_origen}}</td>
                    <td>{{$vuelos->pais_destino}}</td>
                    <td>{{$vuelos->aeropuerto_destino}}</td>
                    <td>{{$vuelos->nombre_aerolinea}}</td>
                    <td>{{$precio}}</td>
                    <td><a href="#">Comprar</a></td>
                </tr>
            @endforeach
            @if(isset($vuelosV))
                @foreach($vuelosV as $vuelov)
                <tr>
                    <td>VUELTA</td>
                    <td>{{$vuelov->fecha_salida}}</td>
                    <td>{{$vuelov->equipaje}}</td>
                    <td>{{$vuelov->pais_origen}}</td>
                    <td>{{$vuelov->aeropuerto_origen}}</td>
                    <td>{{$vuelov->pais_destino}}</td>
                    <td>{{$vuelov->aeropuerto_destino}}</td>
                    <td>{{$vuelov->nombre_aerolinea}}</td>
                    <td>{{$precio}}</td>
                    <td><a href="#">Comprar</a></td>
                </tr>
                @endforeach

            @elseif(isset($vuelosI1))
                @foreach($vuelosI1 as $vuelo1)
                <tr>
                    <td>VUELTA</td>
                    <td>{{$vuelo1->fecha_salida}}</td>
                    <td>{{$vuelo1->equipaje}}</td>
                    <td>{{$vuelo1->pais_origen}}</td>
                    <td>{{$vuelo1->aeropuerto_origen}}</td>
                    <td>{{$vuelo1->pais_destino}}</td>
                    <td>{{$vuelo1->aeropuerto_destino}}</td>
                    <td>{{$vuelo1->nombre_aerolinea}}</td>
                    <td>{{$precio}}</td>
                    <td><a href="#">Comprar</a></td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    @elseif(isset($message))
    <p>{{ $message }}</p>
    @endif
@endsection
