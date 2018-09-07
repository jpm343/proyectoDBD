<!DOCTYPE html>
<html>
  <head>
	 <title>Usuarios</title>
  </head>
  <body>
	 <h2> Usuarios </h2>
    <form action="/usuarios/<?php echo $usuarios->id_usuario; ?>" method="POST">
      @csrf
      Nombre de usuario:<br>
      <input type="text" name="nombre_usuario" value="<?php echo $usuario->nombre_usuario; ?>" required>
      <br>
      ID usuario:<br>
      <input type="text" name="id_usuario" value="<?php echo $usuario->id_usuario; ?>" required disabled>
      <br>
      Correo usuario:<br>
      <input type="text" name="correo_usuario" value="<?php echo $usuario->correo_usuario; ?>" required>
      <br>
      ID rol:<br>
      <input type="text" name="id_rol" value="<?php echo $usuario->id_rol; ?>" required>
      <br>
      <input type="submit" value="Submit">
    </form> 
  </body>
</html>  