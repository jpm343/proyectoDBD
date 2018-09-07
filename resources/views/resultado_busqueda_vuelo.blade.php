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
						<th></th>
						<th>Fecha salida</th>
						<th>Maletas por adulto permitidas</th>
						<th>Pais origen</th>
						<th>Aeropuerto origen</th>
						<th>Pais destino</th>
						<th>Aeropuerto destino</th>
						<th>Nombre aerolinea</th>
						<th>Precio</th>
					</tr>
				</thead>
				<tbody>
					
					@foreach($ida as $vuelos)
						<tr>
							<td>IDA</td>
							<td>{{$ida->fecha_salida}}</td>
							<td>{{$ida->equipaje}}</td>
							<td>{{$ida->pais_origen}}</td>
							<td>{{$ida->aeropuerto_origen}}</td>
							<td>{{$ida->pais_destino}}</td>
							<td>{{$ida->aeropuerto_destino}}</td>
							<td>{{$ida->nombre_aerolinea}}</td>
							<td>{{$ida->precio}}</td>
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
