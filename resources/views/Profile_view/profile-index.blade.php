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
	<div class="container" align="center">
		<img src=/images/usuario.png alt="VALE POR UN USUARIO." width="200" height="200" align="center">
	</div>
	<br/>
	<br/>
	<div class="container" align="center">
		<label align="center"><strong>Nombre: </strong>{{ Auth::user()->name }}</label>
		<br/>
		<label align="center"><strong>Correo: </strong>{{ Auth::user()->email }}</label>
	</div>
	<br/>
	<table class="table table-hover table-striped">
		<thead align="center">
			<th > N° de reserva </th>
			<th > Fecha inscrita </th>
			<th > Descripción </th>
			<th colspan="1">&nbsp;</th>
		</thead>
		<tbody>
			<tr>
				<td align="center">{{ Auth::user()-> name}}</td>
				<td align="center">{{ Auth::user()-> email}}</td>
				<td align="center">{{ Auth::user()-> name}}</td>
				<td align="center">
					<a href="{{route('Traslado.index', 'TrasadoController')}}" class="btn btn-link" > ver detalles</a> 
				</td>
			</tr>
		</tbody>
	</table>
</div>
</body>
</html>