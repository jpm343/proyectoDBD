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
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 md-6 xs-12">
				<h1> {{$hotel->nombre_hotel}} </h1>
				<h3> Puntacion: <?php echo $hotel->puntuacion_hotel; ?> </h3>
				<h5> Descripción: <?php echo $hotel->descripcion_hotel; ?></h5>
				<br>
			</div>
			<div class="col-lg-6 md-6 xs-12">
			<table class="table table-stripped">
				<thead>
					<tr>
						<th></th>
						<th>N° Habitacion</th>
						<th>Capacidad Habitacion</th>
						<th>Tipo Habitacion</th>
						<th>Precio Por Noche</th>
					</tr>
				</thead>
				<tbody>
					
					@foreach($details as $detail)
						<tr>
							<td>HABITACION</td>
							<td>{{$detail->numero_habitacion}}</td>
							<td>{{$detail->capacidad_habitacion}}</td>
							<td>{{$detail->tipo_habitacion}}</td>
							<td>{{$detail->precio_noche_habitacion}}</td>
							<td><button class="btn btn-primary" type="submit">Comprar</button></td>
						</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
	</div>
</body>
</html>