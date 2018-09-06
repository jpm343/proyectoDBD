<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href=./css/bootstrap.min.css>
    <link rel="stylesheet" href=  ./css/personalizado.css>
    <title>Launching.com</title>
</head>
<body>
   @include('navbar.navbar')
<div>
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
	</div>
</div>

</body>
<script src="./js/jquery-slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</html>