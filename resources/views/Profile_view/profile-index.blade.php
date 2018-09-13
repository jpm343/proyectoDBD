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
    @if($errors->any())
        <br/>
        <div align="center">
            <h2>{{$errors->first()}}</h2>
        </div>
    @else
        <table class="table table-hover table-striped">
        <thead align="center">
            <th > Tipo de compra </th>
            <th > Nro de cuenta </th>
            <th > Monto pagado </th>
            <th > Fecha de transacción</th>
        </thead>
        <tbody>
            @foreach($registros as $registro)
            <tr>
                <td align="center"> Reserva</td>
                <td align="center">{{ $registro->tipo_transaccion }}</td>
                <td align="center">${{ $registro->subtotal_registro }}CLP</td>
                <td align="center">{{ $registro->fecha_registro }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    @endif         
    
@endsection
	