<!DOCTYPE html>
<html>
<head>
	<title>Creacion y Edicion Vuelos</title>
</head>
<body>
	<h2> Aerolineas </h2>

<form action="/aerolineas_post" method="POST">
  @csrf
  Nombre Aerolinea:<br>
  <input type="text" name="nombre_aerolinea" value="Nombre Aerolinea">
  <br>
  Puntuacion Aerolinea:<br>
  <input type="text" name="puntuacion_aerolinea" value="Nombre Aerolinea">
  <br>
  Tipo Aerolinea:<br>
  <input type="text" name="tipo_aerolinea" value="Nombre Aerolinea">
  <br>
  <br>
  <input type="submit" value="Submit">
</form> 
</body>
</html>