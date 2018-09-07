<!DOCTYPE html>
<html lang="es"> 
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

	<!-- CSS -->
	<style type="text/css">
	  .boton_personalizado
	  {
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
	<div>
		<br/>
		<br/>
		<h1 align="center">
			oferta de traslados 
		</h1>
		<br/>
		<br/>
		
			<div class= "row">
				<div class="col-md-6" align="left">
					<h3 align="center"> Próximos traslados </h3>
					@include('carousel.carousel')
				</div>
				<div class="col-md-6" align="right">
					<h3 align="center"> Búsque su propio traslados </h3>
					<br/>
					<br/>
					<form action="{{route('Traslado_opciones')}}" method="GET">
						<div class="form-group" align="left" > 
							<label>Fecha traslado</label>
							<input type="date" class="form-control" name="fecha_traslado" required/>
						</div>
						<div class="form-group" align="left" > 
							<label>Hora traslado</label>
							<input type="time" class="form-control" name="hora_traslado" required/>
						</div>
						<div class="form-group" align="left" >
							<label >Nombre del aeropuerto</label>
							<input type="text" class="form-control" name="aeropuerto_traslado" required/>
						</div>
						<div class="form-group" align="left" >
							<label >Nombre del hotel</label>
							<input type="text" class="form-control" name="hotel_traslado" required/>
						</div>
						<div class="form-group" align="left" required>
							<label >¿Desde dónde hasta dónde?</label>
							<select class="custom-select custom-select-sm" name="sentido_traslado"/>
							  <option selected >De aeropuerto a hotel</option>
							  <option value="1">De hotel a aeropuerto</option>
							</select>
						</div>
						<div class="form-group" align="left" >
							<label >Cantidad de pasajeros</label>
							<input class="form-control" type="number" min="1" step="1" value="1" name="cantidad_pasajeros" required/>
						</div>
						<div class="form-group" align="left" >
							<label >Precio traslado máximo</label>
							<input class="form-control" type="number" min="0" step="1" value="0" name="precio_traslado" required/>
						</div>
						<div class="form-group">
							<button class="boton_personalizado" align="right"> Buscar traslados</button>
						</div>
					</form>
				</div> 
			</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>