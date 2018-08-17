@extends('layout')

@section('content')
	<div class="col">
		@include('Traslado_view.Traslado_fragment.Traslado-aside')
	</div>
	<div class="col">
		<h2>
			Editar un traslado
			<a href="{{route('Traslado.index', $traslado->traslado_id)}}" class="btn btn-primary pull-right"> Listado de traslados </a>
		</h2>
		{!! Form::model($traslado, ['route' => ['Traslado.update', $traslado -> traslado_id, 'method' => 'PUT']]) !!}

		 	@include('Traslado_view.Traslado_fragment.Traslado-form')

		{!! Form::close() !!}
	</div>
@endsection