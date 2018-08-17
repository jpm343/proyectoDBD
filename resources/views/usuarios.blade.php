<!DOCTYPE html>
<html>
<head>
	<title>Usuarios</title>
</head>
<body>
	<h2> Usuarios </h2>
 <form action="/usuarios_post" method="POST">
  @csrf
  Nombre de usuario:<br>
  <input type="text" name="nombre_usuario" value="user">
  <br>
  id_usuario:<br>
  <input type="text" name="id_usuario" value="1">
  <br>
  e-mail:<br>
  <input type="text" name="correo_usuario" value="mail@example.com">
  <br>
  Contraseña:<br>
  <input type="password" name="password_usuario" value="123">
  <br>
  id_rol:<br>
  <input type="text" name="id_rol" value="1">
  <br>
  <input type="submit" value="Submit">
</form> 
</body>
</html> 