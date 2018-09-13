@extends('layouts.base')

@section('titulo', 'Perfil de usuario')

@section('contenido')
    <div align="center">
        <img src=/images/usuario.png alt="VALE POR UN USUARIO." width="100" height="100" align="center">
        <br/>
        <label align="center"><strong>Nombre: </strong>{{ Auth::user()->name }}</label>
        <br/>
        <label align="center"><strong>Correo: </strong>{{ Auth::user()->email }}</label>
        <br/>
        <a class="btn btn-default" href="/perfil_fondos" role="button">Mis métodos de pago</a>
    </div>
    <br/>
    <table class="table table-hover table-striped">
        <thead align="center">
            <th > N° de reserva </th>
            <th > Fecha inscrita </th>
            <th > Descripción </th>
            <th colspan="1">&nbsp;</th>
        </thead>
        <tbody>
            <tr>
                <td align="center">{{ Auth::user()-> name}}</td>
                <td align="center">{{ Auth::user()-> email}}</td>
                <td align="center">{{ Auth::user()-> name}}</td>
                <td align="center">
                    <a href="{{route('detalle_reserva')}}" class="btn btn-link" > Detalles</a> 
                </td>
            </tr>
        </tbody>
    </table>
@endsection
