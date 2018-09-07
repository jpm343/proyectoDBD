<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href=/css/bootstrap.min.css>
    <link rel="stylesheet" href=  /css/personalizado.css>
    <title>Reserva actividades</title>
</head>
<body>
	@include('navbar.navbar')
	<br>
	@if(isset($details))
	<div class="container">
		<p> Actividades disponibles en <b> {{ $query }} </b> :</p>
		<h1> Actividades </h1>
			<table class="table table-stripped">
				<thead>
					<tr>
						<th>Ver Detalles</th>
						<th>Nombre</th>
						<th>Ciudad</th>
						<th>Pais</th>
						<th>Precio</th>
					</tr>
				</thead>
				<tbody>
					@foreach($details as $actividad)
						<tr>
							<td><a href="/actividades_details/{{$actividad->id_actividad}}">Detalles</a></td>
							<td>{{ $actividad->nombre_actividad }}</td>
							<td>{{ $actividad->ciudad_actividad }}</td>
							<td>{{ $actividad->pais_actividad }}</td>
							<td>${{ $actividad->precio_actividad }} CLP</td>
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