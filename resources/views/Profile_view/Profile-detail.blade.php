<!DOCTYPE html>
<html>
<head>
	<!-- Requerimientos del metatag-->
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href=/css/bootstrap.min.css>
    <link rel="stylesheet" href=/css/personalizado.css>
	<title> Traslados </title>

	<!-- Esta instruccion agrega Bootstrap CCS a la vista -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href="starter-template.css" rel="stylesheet">
</head>
<body>
<div class="container">
	@include('navbar.navbar')
	<br/>
	<h1 align="center"> Detalle de la reserva </h1>
	<br/>
	<form action="{{route('mostrar_perfil')}}" method="get">
		<div class="form-group">
			<label><strong>ciudad de destino: </strong> Santiago </label>
		</div>
		<div class="form-group">
			<label><strong>fecha de inicio: </strong> 02/02/2012 </label>
		</div>
		<div class="form-group">
			<label><strong>fecha de término: </strong> 03/02/2012 </label>
		</div>
		<div class="form-group">
			<label><strong>cantidad máxima de pasajeros mayores: </strong> 20 </label>
		</div>
		<div class="form-group">
			<label><strong>cantidad máxima de pasajeros menores: </strong> 10 </label>
		</div>
		<div class="form-group">
			<button class="btn btn-primary">Volver</button>
		</div>
	</form>
</div>
</body>
</html>