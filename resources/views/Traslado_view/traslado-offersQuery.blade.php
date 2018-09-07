<!DOCTYPE html>
<html>
<head>
	<!-- Requerimientos del metatag-->
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href=./css/bootstrap.min.css>
    <link rel="stylesheet" href=  ./css/personalizado.css>
	<title> Resultados finales</title>

	<!-- Esta instruccion agrega Bootstrap CCS a la vista -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href="starter-template.css" rel="stylesheet">

	<!-- CSS -->
	<style type="text/css">
	  .boton_personalizado{
	    text-decoration: none;
	    padding: 10px;
	    font-weight: 600;
	    font-size: 20px;
	    color: #ffffff;
	    background-color: #1883ba;
	    border-radius: 6px;
	    border: 2px solid #0016b0;
	  }
	</style>
</head>
<body>
@include('navbar.navbar')
<div class="col">
	<br/>
	<br/>
	<h2 align="center">
		Traslados disponibles 
	</h2>
	<table class="table table-hover table-striped">
			<thead>
				<th > Fecha y hora </th>
				<th > Origen </th>
				<th > Destino </th>
				<th > Cantidad de pasajeros </th>
				<th > Precio </th>
				
				<th colspan="1">&nbsp;</th>
			</thead>
			<tbody>
				@foreach($traslados as $Traslado)
					<tr>
						<td>{{ $Traslado-> fecha_traslado}}</td>
						<td>{{ $Traslado-> origen_traslado}}</td>
						<td>{{ $Traslado-> destino_traslado}}</td>
						<td>{{ $Traslado-> cantidad_pasajeros}}</td>
						<td>{{ $Traslado-> precio_traslado}}</td>
						<td>
							<a href="{{route('Traslado.show', $Traslado->id_traslado)}}" class="btn btn-link"> ver </a> 
						</td>
					</tr>
				@endforeach
			</tbody>
	</table>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>