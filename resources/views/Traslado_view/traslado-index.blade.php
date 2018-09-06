<!DOCTYPE html>
<html lang="es"> 
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href=./css/bootstrap.min.css>
    <link rel="stylesheet" href=  ./css/personalizado.css>
	<title> Traslados </title>

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
<div>
	<br/>
	<br/>
	<h1 align="center">
		oferta de traslados 
	</h1>
	<br/>
	<br/>
	<div class="container">
		<div class= "row">
			<div class="col-md-6" align="left">
				<h3 align="center"> Lo más solicitado </h3>
				@include('carousel.carousel')
			</div>
			<div class="col-md-6" align="right">
				<h3 align="center"> Cotize su traslado </h3>
				<br/>
				<br/>
				<div class="form-group" align="left" > 
					<label>Fecha traslado</label>
					<input type="date" class="form-control">
				</div>
				<div class="form-group" align="left" >
					<label >Origen traslado</label>
					<select class="custom-select custom-select-sm">
					  <option selected>Seleccione una opción</option>
					  <option value="1">Aeropuerto</option>
					  <option value="2">Hotel</option>
					</select>
				</div>
				<div class="form-group" align="left" >
					<label >Nombre origen traslado</label>
					<input type="text" class="form-control">
				</div>
				<div class="form-group" align="left" >
					<label >Destino traslado</label>
					<select class="custom-select custom-select-sm">
					  <option selected>Seleccione una opción</option>
					  <option value="1">Aeropuerto</option>
					  <option value="2">Hotel</option>
					</select>
				</div>
				<div class="form-group" align="left" >
					<label >Nombre destino traslado</label>
					<input type="text" class="form-control">
				</div>
				<div class="form-group" align="left" >
					<label >Cantidad de pasajeros</label>
					<input class="form-control" type="number" name="points" min="0" step="1" value="0">
				</div>
				<div class="form-group" align="left" >
					<label >Precio traslado máximo</label>
					<input class="form-control" type="number" name="points" min="0" step="1" value="0">
				</div>
				<div class="form-group">
					<button class="boton_personalizado" href="{{route('Traslado.create')}}" align="right"> Buscar traslados</button>
				</div>
			</div> 
		</div>
	</div>
</div>
</body>
</html>