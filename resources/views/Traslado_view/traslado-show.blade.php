@extends('layout')

@section('content')
	<div class="col">
		<h2>
			Traslado_id: {{ $traslado-> traslado_id}}
			<a href="{{route('Traslado.edit', $traslado->traslado_id)}}" class="btn btn-primary pull-right"> editar </a>
		</h2>
		<p>
			<strong>{{ $traslado -> descripcion_traslado}}</strong>
		</p>
		{{ $traslado -> body}}
	</div>
	<div class="col">
		@include('Traslado_view.Traslado_fragment.Traslado-aside')
	</div>
@endsection