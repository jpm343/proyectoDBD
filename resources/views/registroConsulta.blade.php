<!DOCTYPE html>
<html>
<head>
	<title>Auditoria</title>
</head>
<body>
	<h2> Auditoria </h2>
 <form action="/registroConsultas_post" method="POST">
  @csrf
  Tipo Consulta (Crear-Leer-Actualizar-Borrar):<br>
  <input type="text" name="tipo_consulta" value="Leer">
  <br><br>Tabla modificada:<br>
  <input type="text" name="tabla_modificada" value="-">
  <br><br>
  Estado antes de consulta:<br>
  <input type="json" name="estado_anterior" value="{&#34;id_rol&#34;:2}">
  <br><br>
  Estado despues de consulta:<br>
  <input type="json" name="estado_actual" value="{&#34;id_rol&#34;:1}">
  <br><br>
  ID filade tabla modificada:<br>
  <input type="text" name="id_modificado" value="1">
  <br><br><br>
  ID usuario que realizo consulta:<br>
  <input type="text" name="id_usuario" value="1">
  <br>
  <br>
  <input type="submit" value="Submit">
</form> 
</body>
</html> 