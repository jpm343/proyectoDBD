<!DOCTYPE html>
<html>
<head>
	<title>Creacion y Edicion Vuelos</title>
</head>
<body>
	<h2> Vuelos </h2>

<form action="/vuelos_post" method="POST">
  @csrf
  Fecha de Salida:<br>
  <input type="text" name="fecha_salida" value="1971-10-06 11:06:06">
  <br>
  Fecha de Llegada:<br>
  <input type="text" name="fecha_llegada" value="1971-10-06 11:06:06">
  <br>
  Ciudad Origen:<br>
  <input type="text" name="ciudad_origen" value="Nombre Ciudad">
  <br>
  Ciudad Destino:<br>
  <input type="text" name="ciudad_destino" value="Nombre Ciudad">
  <br>
  Aeropuerto Origen:<br>
  <input type="text" name="aeropuerto_origen" value="Nombre Aeropuerto">
  <br>
  Aeropuerto Destino:<br>
  <input type="text" name="aeropuerto_destino" value="Nombre Aeropuerto">
  <br>
  Pais Origen:<br>
  <input type="text" name="pais_origen" value="Nombre Pais">
  <br>
  Pais Destino:<br>
  <input type="text" name="pais_destino" value="Nombre Pais">
  <br>
  Nombre Aerolinea:<br>
  <input type="text" name="nombre_aerolinea" value="Nombre Aerolinea">
  <br>
  <br>
  <input type="submit" value="Submit">
</form> 
</body>
</html>