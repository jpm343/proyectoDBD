@extends('layout')

@section('content')
	<div class="col">
		<h2>
			Nuevo hotel
			<a href="{{route('Hotel.index')}}" class="btn btn-primary pull-right"> Listado de hoteles </a>
		</h2>
		
		Formulario
	</div>
	<div class="col">
		@include('Hotel_view.Hotel_fragment.Hotel-aside')
	</div>
@endsection