@extends('layout')

@section('content')
	<div class="col">
		@include('Hotel_view.Hotel_fragment.Hotel-aside')
	</div>
	<div class="col">
		<h2>
			Editar un hotel
			<a href="{{route('Hotel.index')}}" class="btn btn-primary pull-right"> Listado de hoteles </a>
		</h2>
		@include('Hotel_view.Hotel_fragment.Hotel-error')		
		{!! Form::model($hotel, ['route' => ['Hotel.update', $hotel -> hotel_id], 'method' => 'PUT']) !!}

		 	@include('Hotel_view.Hotel_fragment.Hotel-form')

		{!! Form::close() !!}
	</div>
@endsection