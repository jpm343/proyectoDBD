@extends('layouts.base')

@section('titulo', 'Carrito de compras')

@section('contenido')
    <div align="center">
        <br/>
        <a class="btn btn-primary" href="/pagar_orden" role="button">Proceder al pago</a>
        <br/>
        @if($errors->any())
            <small>{{$errors->first()}}</small>
        @endif 
    </div>
    <br/>
	<table class="table table-hover table-striped">
        <thead align="center">
            <th > N° de reserva </th>
            <th > Fecha de Realización </th>
            <th > Precio </th>
            <th colspan="1">&nbsp;</th>
        </thead>
        <tbody>
        	<?php $_SESSION['carro'] = unserialize(serialize($_SESSION['carro']));?>
        	<?php foreach($_SESSION['carro'] as $key => $reservas): ?>
	            <tr>
	                <td align="center">{{ $reservas->id_reserva}}</td>
	                <td align="center">{{ $reservas->created_at}}</td>
	                <td align="center">{{ $reservas->precio}}</td>
	                <td align="center">
	                    <a href="/carro_remover/{{$reservas->id_reserva}}" class="btn btn-link" > Eliminar</a> 
	                </td>
	        <?php endforeach; ?>	        	
        </tbody>
    </table>
@endsection