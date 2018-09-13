@extends('layouts.base')

@section('titulo', 'Fondos de usuario')

@section('contenido')
	<div align="center">
        <img src=/images/usuario.png alt="VALE POR UN USUARIO." width="100" height="100" align="center">
        <br/>
        <label align="center"><strong>Nombre: </strong>{{ Auth::user()->name }}</label>
        <br/>
        <label align="center"><strong>Correo: </strong>{{ Auth::user()->email }}</label>
        <br/>
        <a class="btn btn-default" href="/perfil_fondos_form" role="button">Añadir un método de pago</a>
    </div>
    <br/>
    <table class="table table-hover table-striped">
        <thead align="center">
            <th > N° de cuenta </th>
            <th > Saldo disponible </th>
            <th > Banco de origen </th>
            <th colspan="1">&nbsp;</th>
        </thead>
        <tbody>
        	@forelse($fondos as $fondo_usuario)
	            <tr>
	                <td align="center">{{ $fondo_usuario->cuenta_origen}}</td>
	                <td align="center">{{ $fondo_usuario->monto_actual}}</td>
	                <td align="center">{{ $fondo_usuario->banco_origen}}</td>
	                <td align="center">
	                    <a href="/perfil_fondos_details/{{$fondo_usuario->id_fondos}}" class="btn btn-link" > Agregar Fondos</a> 
	                </td>
	            </tr>
	        @empty
	        	<p> No hay fondos asociados a esta cuenta.</p>
	        @endforelse
        </tbody>
    </table>
@endsection