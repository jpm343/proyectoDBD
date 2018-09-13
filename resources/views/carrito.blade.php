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
    <h2><strong>Actividades</strong></h2>
	<table class="table table-hover table-striped">
        <thead align="center">
            <th > N° de reserva </th>
            <th > Ciudad destino </th>
            <th > Cantidad mayores </th>
            <th colspan="1">&nbsp;</th>
        </thead>
        <tbody>
        	<?php $_SESSION['carro'] = unserialize(serialize($_SESSION['carro']));?>
        	<?php foreach($_SESSION['carro'] as $key => $reserva): ?>
	            <tr>
	                <td align="center">{{ $reserva->id_reserva}}</td>
	                <td align="center">{{ $reserva->ciudad_destino}}</td>
	                <td align="center">{{ $reserva->cantidad_mayores}}</td>
	                <td align="center">
	                    <a href="/carro_remover/{{$reserva->id_reserva}}" class="btn btn-link" aling="rigth"> Eliminar</a> 
	                </td>
	        <?php endforeach; ?>	        	
        </tbody>
    </table>
    <br/>
    <h2><strong>Traslados</strong></h2>
    <table class="table table-hover table-striped">
        <thead align="center">
            <th > Fecha y hora </th>
            <th > Origen </th>
            <th > Destino </th>
            <th > Cantidad de pasajeros </th>
            <th > Precio </th>
            <th colspan="1">&nbsp;</th>
        </thead>
            <?php $_SESSION['carro'] = unserialize(serialize($_SESSION['carro']));?>
            <?php foreach($_SESSION['carro'] as $key => $reservaTraslado): ?>
                <tr>
                    <td align="center">{{$reservaTraslado-> fecha_traslado}}</td>
                    <td align="center">{{$reservaTraslado-> origen_traslado}}</td>
                    <td align="center">{{$reservaTraslado-> destino_traslado}}</td>
                    <td align="center">{{$reservaTraslado-> cantidad_pasajeros}}</td>
                    <td align="center">{{$reservaTraslado-> precio_traslado}}</td>
                    <td align="center">
                        <a href="" class="btn btn-link" aling="rigth"> Eliminar</a> 
                    </td>
                </tr>
            <?php endforeach; ?>
        <tbody>
        </tbody>
    </table>
    <br/>
@endsection