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
    </div>
    <br/>

    <form action="/perfil_fondos_anadir" method="post">
    @csrf
        <div class="form-group">
            <label for="Monto">Número de cuenta</label>
            <input type="text" name="cuenta_origen" class="form-control" id="Monto" required>
        </div>
        <div class="form-group">
        	<label for="Monto_nuevo">Banco de origen</label>
        	<input type="text" name="banco_origen" class="form-control" id="Monto_nuevo" required>
        </div>
        <button class="btn btn-default" type="submit">Agregar Fondos</button>
        @if($errors->any())
            <small>{{$errors->first()}}</small>
        @endif 
    </form>
@endsection