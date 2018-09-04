<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href=./css/bootstrap.min.css>
    <link rel="stylesheet" href=  ./css/personalizado.css>
    <title>Reserva actividades</title>
</head>
<body>
	@include('navbar.navbar')
	<br><br>
	<div class="col-lg-6 xs-12">
		<form>
		  <div class="form-row">
		    <div class="col-md-12 mb-3">
		      <label for="validationDefault01">Destino </label>
		      <input type="text" class="form-control" id="validationDefault01" placeholder="city" value="Ingeresa una ciudad" required>
		    </div>
		  <button class="btn btn-primary" type="submit">Buscar</button>
		</form>
	</div>
</body>
</html>