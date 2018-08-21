@extends('layout')

@section('content')
	<div class="col">
		@include('Traslado_view.Traslado_fragment.Traslado-aside')
	</div>
	<div class="col">
		<h2>
			listado de traslados
			<a href="{{route('Traslado.create')}}" class="btn btn-primary pull-right"> Nuevo </a>
		</h2>
		@include('Traslado_view.Traslado_fragment.Traslado-info')
		<table class="table table-hover table-striped">
			<thead>
				<th > Traslado_id </th>
				<th > Fecha </th>
				<th > Descripción </th>
				<th > Origen </th>
				<th > Destino</th>
				<th > Precio </th>
				<th colspan="3">&nbsp;</th>
			</thead>
			<tbody>
				@foreach($traslados as $Traslado)
					<tr>
						<td>{{ $Traslado-> traslado_id}}</td>
						<td>{{ $Traslado-> fecha_traslado}}</td>
						<td>
							<strong>{{ $Traslado-> descripcion_traslado}}</strong>
							{{ $Traslado-> short}}
						</td>
						<td>{{ $Traslado-> origen_traslado}}</td>
						<td>{{ $Traslado-> destino_traslado}}</td>
						<td>{{ $Traslado-> precio_traslado}}</td>
						<td> 
							<a href="{{route('Traslado.show', $Traslado->traslado_id)}}" class="btn btn-link"> ver </a> 
						</td>
						<td> 
							<a href="{{route('Traslado.edit', $Traslado->traslado_id)}}" class="btn btn-link"> editar </a>
						</td>
						<td>
							<form action="{{route('Traslado.destroy', $Traslado->traslado_id)}}" method="POST">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="DELETE">
								<button class="btn btn-link"> borrar </button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{!! $traslados -> links('vendor.pagination.bootstrap-4') !!}
	</div>
@endsection