<!DOCTYPE html>
<html>
<head>
	<title>Actividades</title>
</head>
<body>
	<h2> Actividades </h2>
 <form action="/actividads_post" method="POST">
  @csrf
  Nombre de la actividad:<br>
  <input type="text" name="nombre_actividad" value="Actividad">
  <br>
  ID actividad (dejar vacio para crear una nueva):<br>
  <input type="text" name="id_actividad">
  <br>
  Puntuacion actividad:<br>
  <input type="text" name="puntuacion_actividad" value="1.0">
  <br>
  Descripcion de la actividad:<br>
  <input type="text" name="descripcion_actividad" value="Escriba su descripcion aqui">
  <br>
  Ciudad de la actividad:<br>
  <input type="text" name="ciudad_actividad" value="ciudad">
  <br>
  Pais de la actividad:<br>
  <input type="text" name="pais_actividad" value="pais">
  <br>
  Fechas disponibles:<br>
  <input type="text" name="fechas_disponibles" value="fechas">
  <br>
  <input type="submit" value="Submit">
</form> 
</body>
</html> 