@extends('layout')

@section('content')
	<div class="col">
		@include('Habitacion_view.Habitacion_fragment.Habitacion-aside')
	</div>
	<div class="col">
		<h2>
			Editar una habitación
			<a href="{{route('Habitacion.index')}}" class="btn btn-primary pull-right"> Listado de habitaciones </a>
		</h2>
		@include('Habitacion_view.Habitacion_fragment.Habitacion-error')
		<form action="{{route('Habitacion.update', $habitacion->habitacion_id)}}" method="PUT">
			@include('Habitacion_view.Habitacion_fragment.Habitacion-form')
		</form>
	</div>
@endsection