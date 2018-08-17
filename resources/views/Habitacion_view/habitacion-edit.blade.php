@extends('layout')

@section('content')
	<div class="col">
		<h2>
			Editar una habitación
			<a href="{{route('Habitacion.index')}}" class="btn btn-primary pull-right"> Listado de habitaciones </a>
		</h2>
		 
		 Formulario
	</div>
	<div class="col">
		@include('Habitacion_view.Habitacion_fragment.Habitacion-aside')
	</div>
@endsection