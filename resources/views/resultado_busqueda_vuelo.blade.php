@extends('layouts.base')

@section('titulo', 'Vuelos')

@section('contenido')
    @if(isset($vuelosI))
    <table class="table table-stripped">
        <thead>
            <tr><th>Destino</th>
                <th>Fecha salida</th>
                <th>Llegada a destino</th>
                <th>Maletas por adulto permitidas</th>
                <th>Ciudad origen</th>
                <th>Aeropuerto origen</th>
                <th>Ciudad destino</th>
                <th>Aeropuerto destino</th>
                <th>Nombre aerolinea</th>
                <th>Precio CLP</th>
                <th>Reservar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vuelosI as $vuelos)
                <tr>
                    <td>IDA</td>
                    <td>{{$vuelos->fecha_salida}}</td>
                    <td>{{$vuelos->fecha_llegada}}</td>
                    <td>{{$vuelos->equipaje}}</td>
                    <td>{{$vuelos->ciudad_origen}}</td>
                    <td>{{$vuelos->aeropuerto_origen}}</td>
                    <td>{{$vuelos->ciudad_destino}}</td>
                    <td>{{$vuelos->aeropuerto_destino}}</td>
                    <td>{{$vuelos->nombre_aerolinea}}</td>
                    <td>{{$vuelos->precio}}</td>
                    <td>@guest
                        Inicie sesión para reservar
                        @else
                        <a href="reserva_vuelo/{{$vuelos->id_vuelo}}/{{$mayores}}/{{$menores}}"</a>Reservar</td>
                        @endguest
                </tr>
            @endforeach
            @if(isset($vuelosV))
                @foreach($vuelosV as $vuelov)
                <tr>
                    <td>VUELTA</td>
                    <td>{{$vuelov->fecha_salida}}</td>
                    <th>{{$vuelov->fecha_llegada}}</th>
                    <td>{{$vuelov->equipaje}}</td>
                    <td>{{$vuelov->ciudad_origen}}</td>
                    <td>{{$vuelov->aeropuerto_origen}}</td>
                    <td>{{$vuelov->ciudad_destino}}</td>
                    <td>{{$vuelov->aeropuerto_destino}}</td>
                    <td>{{$vuelov->nombre_aerolinea}}</td>
                    <td>{{$vuelov->precio}}</td>
                    <td>@guest
                        Inicie sesión<br/>para reservar
                        @else
                        <a href="reserva_vuelo/{{$vuelos->id_vuelo}}/{{$mayores}}/{{$menores}}">Comprar</a></td>
                        @endguest
                </tr>
                @endforeach

            @elseif(isset($vuelosI1))
                @foreach($vuelosI1 as $vuelo1)
                <tr>
                    <td>VUELTA</td>
                    <td>{{$vuelo1->fecha_salida}}</td>
                    <th>{{$vuelo1->fecha_llegada}}</th>
                    <td>{{$vuelo1->equipaje}}</td>
                    <td>{{$vuelo1->ciudad_origen}}</td>
                    <td>{{$vuelo1->aeropuerto_origen}}</td>
                    <td>{{$vuelo1->ciudad_destino}}</td>
                    <td>{{$vuelo1->aeropuerto_destino}}</td>
                    <td>{{$vuelo1->nombre_aerolinea}}</td>
                    <td>{{$vuelo1->precio}}</td>
                    <td>@guest
                        Inicie sesión<br/>para reservar
                        @else
                        <a href="reserva_vuelo/{{$vuelos->id_vuelo}}/{{$mayores}}/{{$menores}}">Comprar</a></td>
                        @endguest
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    @elseif(isset($message))
    <p>{{ $message }}</p>
    @endif
@endsection
