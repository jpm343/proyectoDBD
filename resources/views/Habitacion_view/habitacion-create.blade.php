@extends('layout')

@section('content')
	<div class="col">
		@include('Habitacion_view.Habitacion_fragment.Habitacion-aside')
	</div>
	<div class="col">
		<h2>
			Nueva habitación 
			<a href="{{route('Habitacion.index')}}" class="btn btn-primary pull-right"> Listado de habitaciones </a>
		</h2>
		 @include('Habitacion_view.Habitacion_fragment.Habitacion-error')
		 {!! Form::open(array('action'=> 'HabitacionController@store')) !!}
		 	@include('Habitacion_view.Habitacion_fragment.Habitacion-form')
		 {!! Form::close() !!}
	</div>
@endsection