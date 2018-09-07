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
<<<<<<< HEAD
	<div class="row">
		<div class="col-sm-6" align="center">
	   		@include('carousel.carousel')
		</div>
		<div class="col-sm-6" align="center">
			<br/>
			<br/>
			<form align="justify">
			  <div>
			   	<label for="Ciudad" >Ingrese Ciudad</label>
		   		<input type="text" name="Ciudad">
			  </div>
			  <div>
			  	<label for="name">Apellido</label>
			   	<input type="text" name="apellido">
			  </div>
			  <div>
			   	<label for="msg">Mensaje</label>
			   	<textarea id="msg"></textarea>
			  </div>
			  <div>
			  	<label for="submit"></label>
			  	<input type="submit">
			  </div>
			</form>
		</div>
=======
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
>>>>>>> 9e1e8a49db525a52b5308aa3c42071d2a9d17cf0
	</div>
</div>

</body>
<script src="./js/jquery-slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</html>