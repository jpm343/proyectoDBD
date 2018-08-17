@extends('layout')

@section('content')
	<div class="col">
		<h2>
			{{ $hotel-> nombre_hotel}}
			<a href="{{route('Hotel.edit', $hotel->hotel_id)}}" class="btn btn-primary pull-right"> editar </a>
		</h2>
		<p>
			<strong>{{ $hotel -> descripcion_hotel}}</strong>
		</p>
		{{ $hotel -> body}}
	</div>
	<div class="col">
		@include('Hotel_view.Hotel_fragment.Hotel-aside')
	</div>
@endsection