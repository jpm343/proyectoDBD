<!DOCTYPE html>
<html>
<head>
<!-- Requerimientos del metatag-->
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href=/css/bootstrap.min.css>
    <link rel="stylesheet" href=/css/personalizado.css>
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
<div class="container">
	@include('navbar.navbar')
	<br/>
	<br/>
	<h1 align="center">
		Detalle del traslado
	</h1>
	<div class="row">
		<div class="col-sm-6" align="left">
			@include('carousel.carousel')
		</div>
		<div class="col-sm-6" align="left">
			<div clas="form">
				<br/>
				<br/>
				<label align="justify"> <strong>Fecha y hora del traslado:</strong> {{ $traslado-> fecha_traslado}} </label> 
				<br/>
				<label align="justify"> <strong>Punto de patida:</strong> {{ $traslado-> origen_traslado}} </label> 
				<br/>
				<label align="justify"> <strong>Punto de llegada:</strong> {{ $traslado-> destino_traslado}} </label> 
				<br/>
				<label align="justify"> <strong>Cantidad máxima de pasajeros:</strong> {{ $traslado-> cantidad_pasajeros}} </label>
				<br/> 
				<label align="justify"> <strong> Precio del traslado:</strong> ${{ $traslado-> precio_traslado}} </label> 
				<br/>
				<br/>
				<label align="justify"> <strong>Descripción del traslado</strong></label> 
				<p>{{ $traslado -> descripcion_traslado}}</p>
			</div>
			<br/>
			<form action= "{{route('Traslado.index')}}" method="GET">
					<button class="btn btn-primary" align="right"> Agregar al carrito</button>
					<button class="btn btn-primary" align="right"> Buscar otro traslado</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>