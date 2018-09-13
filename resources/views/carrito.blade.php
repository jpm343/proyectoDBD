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
            <th > Ciudad destino </th>
            <th > Cantidad mayores </th>
            <th colspan="1">&nbsp;</th>
        </thead>
        <tbody>
        	<?php $_SESSION['carro'] = unserialize(serialize($_SESSION['carro']));?>
        	<?php foreach($_SESSION['carro'] as $key => $reservas): ?>
	            <tr>
	                <td align="center">{{ $reservas->id_reserva}}</td>
	                <td align="center">{{ $reservas->ciudad_destino}}</td>
	                <td align="center">{{ $reservas->cantidad_mayores}}</td>
	                <td align="center">
	                    <a href="/carro_remover/{{$reservas->id_reserva}}" class="btn btn-link" > Eliminar</a> 
	                </td>
	        <?php endforeach; ?>	        	
        </tbody>
    </table>
@endsection