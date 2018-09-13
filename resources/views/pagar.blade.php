@extends('layouts.base')

@section('titulo', 'Sólo falta un paso!')

@section('contenido')
	<div align="center">
        <label align="center"><strong>Usuario: </strong>{{ Auth::user()->name }}</label>
        <br/>
        <label align="center"><strong>Total a pagar: ${{$subtotal}}CLP</label>
    </div>
    <br/><br/>
    <div class="row" align="center">
    	<div class="col-sm-6">
    		<label align="center"><strong>Detalle de la compra:</strong></label>
    		<table class="table table-hover table-striped">
		        <thead align="center">
		            <th > N° de reserva </th>
		            <th > Tipo de reserva </th>
		            <th > Subtotal </th>
		        </thead>
		        <tbody>
		        	@forelse($details as $detalle)
			            <tr>
			                <td align="center">{{ $detalle['id']}}</td>
			                <td align="center">{{ $detalle['tipo']}}</td>
			                <td align="center">{{ $detalle['subtotal']}}</td>
			            </tr>
			        @empty
			        	<p> No hay fondos asociados a esta cuenta.</p>
			        @endforelse
		        </tbody>
		    </table>
    	</div>
    	<div class="col-sm-6">
    		<label align="center"><strong>Selecciona tu método de pago:</strong></label>
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
			                <td align="center">${{ $fondo_usuario->monto_actual}} CLP</td>
			                <td align="center">{{ $fondo_usuario->banco_origen}}</td>
			                <td align="center">
			                    <a href="/verificar_pago/{{$subtotal}}/cuenta/{{$fondo_usuario->id_fondos}}" class="btn btn-primary" role="button"> Seleccionar</a>
			                    @if($errors->any())
									<small>{{$errors->first()}}</small>
								@endif 
			                </td>
			            </tr>
			        @empty
			        	<p> No hay fondos asociados a esta cuenta.</p>
			        @endforelse
		        </tbody>
		    </table>
    	</div>
    </div>

@endsection