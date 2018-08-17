@extends('layout')

@section('content')
	<div class="col">
		<h2>
			Editar un traslado
			<a href="{{route('Traslado.index', $traslado->traslado_id)}}" class="btn btn-primary pull-right"> Listado de traslados </a>
		</h2>
		Formulario
	</div>
	<div class="col">
		@include('Traslado_view.Traslado_fragment.Traslado-aside')
	</div>
@endsection