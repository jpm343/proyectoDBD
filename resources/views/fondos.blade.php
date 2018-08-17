<!DOCTYPE html>
<html>
<head>
	<title>Fondos</title>
</head>
<body>
	<h2> Fondos </h2>
 <form action="/fondos_post" method="POST">
  @csrf
  Cuenta Origen:<br>
  <input type="text" name="cuenta_origen" value="2450003">
  <br>
  ID fondos (dejar vacio para crear una nueva):<br>
  <input type="text" name="id_fondos">
  <br>
  Monto actual:<br>
  <input type="text" name="monto_actual" value="0">
  <br>
  Banco origen:<br>
  <input type="text" name="banco_origen" value="Ejemplo: bancoestado">
  <br>
  ID usuario:<br>
  <input type="text" name="id_usuario" value="id usuario">
  <br>
  <input type="submit" value="Submit">
</form> 
</body>
</html> 