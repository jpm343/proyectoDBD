<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href=/css/bootstrap.min.css>
    <link rel="stylesheet" href=  /css/personalizado.css>
    <title>Reserva Alojamientos</title>
</head>
<body>
	@include('navbar.navbar')
	<br>
	@if(isset($details))
	<div class="container">
		<p> Resultados de Búsqueda:</p>
		<h1> Vuelos	 </h1>
			<table class="table table-stripped">
				<thead>
					<tr>
						<th>Ver Detalles</th>
						<th>Nombre</th>
						<th>Ciudad</th>
						<th>Descripcion</th>
						<th>Precio Por Noche Desde</th>
					</tr>
				</thead>
				<tbody>
					@foreach($details as $alojamiento)
						<tr>
							<td><a href="/alojamientos_detail/{{$alojamiento->id_hotel}}">Detalles</a></td>
							<td>{{ $alojamiento->nombre_hotel }}</td>
							<td>{{ $alojamiento->ciudad_hotel }}</td>
							<td>{{ $alojamiento->descripcion_hotel }}</td>
							<td>${{ $Arreglo[$alojamiento->id_hotel] }} CLP</td>
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