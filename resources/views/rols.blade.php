<!DOCTYPE html>
<html>
<head>
	<title>Roles</title>
</head>
<body>
	<h2> Rol </h2>
 <form action="/rols_post" method="POST">
  @csrf
  Nombre rol:<br>
  <input type="text" name="nombre_rol" value="Rol">
  <br>
  Descripcion del rol:<br>
  <input type="text" name="descripcion" value="Descripcion">
  <br>
  
  <input type="submit" value="Submit">
</form> 
</body>
</html>