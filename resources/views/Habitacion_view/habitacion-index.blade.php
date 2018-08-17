@extends('layout')

@section('content')
	<div class="col">
			@include('Habitacion_view.Habitacion_fragment.Habitacion-aside')
	</div>
	<div class="col">
		<h2>
			listado de habitaciones
			<a href="{{route('Habitacion.create')}}" class="btn btn-primary pull-right"> Nuevo </a>
		</h2>
		@include('Habitacion_view.Habitacion_fragment.Habitacion-info')
		<table class="table table-hover table-striped">
			<thead>
				<th > Habitación_id </th>
				<th > numero </th>
				<th > capacidad </th>
				<th > precio noche</th>
				<th > tipo </th>
				<th colspan="3">&nbsp;</th>
			</thead>
			<tbody>
				@foreach($habitaciones as $habitacion)
					<tr>
						<td>{{ $habitacion-> habitacion_id}}</td>
						<td>{{ $habitacion-> numero_habitacion}}</td>
						<td>{{ $habitacion-> capacidad_habitacion}}</td>
						<td>{{ $habitacion-> precio_noche_habitacion}}</td>
						<td>
							<strong>{{ $habitacion-> tipo_habitacion}}</strong>
							{{ $habitacion-> short}}
						</td>
						<td>
							<a href="{{route('Habitacion.show', $habitacion->habitacion_id)}}" class="btn btn-link"> ver </a>  
						</td>
						<td> 
							<a href="{{route('Habitacion.edit', $habitacion->habitacion_id)}}" class="btn btn-link"> editar </a>  
						</td>
						<td>
							<form action="{{route('Habitacion.destroy', $habitacion->habitacion_id)}}" method="POST">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="DELETE">
								<button class="btn btn-link"> borrar </button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{!! $habitaciones -> links('vendor.pagination.bootstrap-4') !!}
	</div>
@endsection