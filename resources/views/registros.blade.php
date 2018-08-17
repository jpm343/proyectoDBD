<!DOCTYPE html>
<html>
<head>
	<title>Registros</title>
</head>
<body>
	<h2> Registros </h2>
 <form action="/registros_post" method="POST">
  @csrf
  Fecha del registro:<br>
  <input type="text" name="fecha_registro" value="Fecha">
  <br>
  ID registro (dejar vacio para crear uno nuevo):<br>
  <input type="text" name="id_registro">
  <br>
  Tipo transaccion:<br>
  <input type="text" name="tipo_transaccion" value="Ejemplo: mastercard">
  <br>
  Subtotal del registro:<br>
  <input type="text" name="subtotal_registro" value="0">
  <br>
  ID del usuario:<br>
  <input type="text" name="id_usuario" value="id del usuario">
  <br>
  <input type="submit" value="Submit">
</form> 
</body>
</html> 