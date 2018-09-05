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
	@csrf
	<br><br>
	<div class="col-lg-6 xs-12">
		<form action="/actividades_search" method="get">

			<div class="form-row">
			    <div class="col-md-12 mb-3">
				    <label for="ciudadDestino">Destino </label>
				    <input type="text" name="ciudad_destino" class="form-control" id="ciudadDestino" placeholder="Ciudad" required>
				    <br>
				    <button class="btn btn-primary" type="submit">Buscar</button>
			    </div>
			</div>
		</form>
	</div>
</body>
</html>