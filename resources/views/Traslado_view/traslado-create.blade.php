@extends('layout')

@section('content')
	<div class="col">
		<h2>
			Nuevo traslado
			<a href="{{route('Traslado.index')}}" class="btn btn-primary pull-right"> Listado de traslados </a>
		</h2>
		@include('Traslado_view.Traslado_fragment.Traslado-error')
		{!! Form::open(array('action'=> 'TrasladoController@store')) !!}

		 	@include('Traslado_view.Traslado_fragment.Traslado-form')

		{!! Form::close() !!}
	</div>
	<div class="col">
		@include('Traslado_view.Traslado_fragment.Traslado-aside')
	</div>
@endsection