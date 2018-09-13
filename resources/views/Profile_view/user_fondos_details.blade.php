@extends('layouts.base')

@section('titulo', 'Agregar fondos a la cuenta')

@section('contenido')
	<div align="center">
        <img src=/images/usuario.png alt="VALE POR UN USUARIO." width="100" height="100" align="center">
        <br/>
        <label align="center"><strong>Nombre: </strong>{{ Auth::user()->name }}</label>
        <br/>
        <label align="center"><strong>Correo: </strong>{{ Auth::user()->email }}</label>
        <br/>
        <label align="center"><strong>Cuenta Seleccionada: </strong>{{$fondo->cuenta_origen}}<b> del banco </b>{{$fondo->banco_origen}}</label>
    </div>
    <br/>

    <form action="/perfil_fondos/{{$fondo->id_fondos}}" method="post">
    @csrf
        <div class="form-group">
            <label for="Monto">Monto actual</label>
            <input type="text" name="monto_actual" class="form-control" id="Monto" value="{{$fondo->monto_actual}}" disabled>
        </div>
        <div class="form-group">
        	<label for="Monto_nuevo">Monto a agregar</label>
        	<input type="text" name="monto" class="form-control" id="Monto_nuevo" value="0" required>
        </div>
        <button class="btn btn-default" type="submit">Agregar Fondos</button>
        @if($errors->any())
            <small>{{$errors->first()}}</small>
        @endif 
    </form>
@endsection