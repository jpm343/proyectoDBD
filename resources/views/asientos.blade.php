<!DOCTYPE html>
<html>
<head>
	<title>Creacion y Edicion Vuelos</title>
</head>
<body>
	<h2> Asientos </h2>

<form action="/asiento_post" method="POST">
  @csrf
  ID Asiento:<br>
  <input type="text" name="id_asiento" value="ID Asiento">
  <br>
  Rut Pasajero:<br>
  <input type="text" name="rut_pasajero" value="Rut Pasajero">
  <br>
  Clase Asiento:<br>
  <input type="text" name="clase_asiento" value="Clase Asiento">
  <br>
  Numero Asiento:<br>
  <input type="text" name="numero_asiento" value="Numero Asiento">
  <br>
  Nombre Pasajero:<br>
  <input type="text" name="nombre_pasajero" value="Nombre Pasajero">
  <br>
  Número Vuelo:<br>
  <input type="text" name="id_vuelo" value="Numero Vuelo">
  <br>
  <br>
  <input type="submit" value="Submit">
</form> 
</body>
</html>