@extends('layout')

@section('content')
	<div class="col">
		@include('Hotel_view.Hotel_fragment.Hotel-aside')
	</div>
	<div class="col">
		<h2>
			listado de hoteles
			<a href="{{route('Hotel.create')}}" class="btn btn-primary pull-right"> Nuevo </a>
		</h2>
		@include('Hotel_view.Hotel_fragment.Hotel-info')
		<table class="table table-hover table-striped">
			<thead>
				<th > Hotel_id </th>
				<th > Hotel_nombre </th>
				<th > puntuacion </th>
				<th > descripcion </th>
				<th > direccion </th>
				<th > ciudad </th>

				<th colspan="3">&nbsp;</th>
			</thead>
			<tbody>
				@foreach($hoteles as $hotel)
					<tr>
						<td>{{ $hotel-> hotel_id}}</td>
						<td>{{ $hotel-> nombre_hotel}}</td>
						<td>{{ $hotel-> puntuacion_hotel}}</td>
						<td>
							<strong>{{ $hotel-> descripcion_hotel}}</strong>
							{{ $hotel-> short}}
						</td>
						<td>
							<strong>{{ $hotel-> direccion_hotel}}</strong>
							{{ $hotel-> short}}
						</td>
						<td>
							<strong>{{ $hotel-> ciudad_hotel}}</strong>
							{{ $hotel-> short}}
						</td>
						<td>
							<a href="{{route('Hotel.show', $hotel->hotel_id)}}" class="btn btn-link"s> ver </a> 
						</td>
						<td>
							<a href="{{route('Hotel.edit', $hotel->hotel_id)}}" class="btn btn-link"> editar </a>  
						</td>

						<td>
							<form action="{{route('Hotel.destroy', $hotel->hotel_id)}}" method="POST">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="DELETE">
								<button class="btn btn-link"> borrar </button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{!! $hoteles -> links('vendor.pagination.bootstrap-4') !!}
	</div>
@endsection