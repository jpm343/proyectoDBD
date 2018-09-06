<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href=./css/bootstrap.min.css>
    <link rel="stylesheet" href=  ./css/personalizado.css>
    <title>Reserva vuelos</title>
</head>
<body>
	@include('navbar.navbar')
	<br>
	@if(isset($details))
	<div class="container">
		<h1> Vuelos </h1>
			<table class="table table-stripped">
				<thead>
					<tr>
						<th>Fecha salida</th>
						<th>Pais origen</th>
						<th>Aeropuerto origen</th>
						<th>Pais destino</th>
						<th>Aeropuerto destino</th>
						<th>Nombre aerolinea</th>

					</tr>
				</thead>
				<tbody>
					@foreach($details as $vuelos)
						<tr>
							<td>{{$vuelos->fecha_salida}}</td>
							<td>{{ $vuelos->pais_origen}}</td>
							<td>{{ $vuelos->aeropuerto_origen}}</td>
							<td>{{ $vuelos->pais_destino}}</td>
							<td>{{ $vuelos->aeropuerto_destino}}</td>
							<td>{{ $vuelos->nombre_aerolinea}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
	</div>
	@elseif(isset($message))
		<p>{{ $message }}</p>
	@endif
</body>
</html> 
