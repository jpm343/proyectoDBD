@extends('layout')

@section('content')
	<div class="col">
		<h2>
			Habitacion_id: {{ $habitacion-> habitacion_id}}
			<a href="{{route('Habitacion.edit', $habitacion-> habitacion_id)}}" class="btn btn-primary pull-right"> editar </a>
		</h2>
		<p>
			<strong>{{ $habitacion-> tipo_habitacion}}</strong>
		</p>
		{{ $habitacion -> body}}
	</div>
	<div class="col">
		@include('Habitacion_view.Habitacion_fragment.Habitacion-aside')
	</div>
@endsection