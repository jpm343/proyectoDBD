<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href=./css/personalizado.css>
    <link rel="stylesheet" href=./css/bootstrap.min.css>
    <title>Launching.com</title>
</head>
<body>
   @include('navbar.navbar')
<div>
	<div style="float: left;">
   		@include('carousel.carousel')
	</div>
	<div style="float: right;">
		<form style="width: 500px; height: 400px; margin-right: 50px; margin-top: 49px; background: #F1F55A;" action="/alojamientos_search" method="get"> 
          <div class="form-inline" role="form" class="form-group">
            <label for="Destino">Destino </label>
            <input type="text" class="form-control" name="destino" placeholder="Ingrese Ciudad Destino">         
          </div>
          <div class="form-inline" class="form-group">
            <label for="ida">Fechas</label>
            <input id="ida" class="form-control" type="date" name="fechaIda">
            <input id="vuelta" class="form-control" type="date" name="fechaVuelta">
          </div>
          <div class="form-inline" class="form-group">
          	<label for="especificaciones">Especificaciones</label>
          	<input id="ida" class="form-control" type="number" value="1" name="cantidadHabitaciones">
            <input id="vuelta" class="form-control" type="number" value="2" name="cantidadPersonasMayores">
            <input id="vuelta" class="form-control" type="number" value="0" name="cantidadPersonasMenores">
          </div>
          <div >
            <input type="submit" class="btn btn-info" value="Buscar">
          </div>
        </form>
	</div>
</div>
</body>
<script src="./js/jquery-slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</html>