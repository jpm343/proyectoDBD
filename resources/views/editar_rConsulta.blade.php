<!DOCTYPE html>
<html>
  <head>
	 <title>Auditoria</title>
  </head>
  <body>
	 <h2> Auditoria </h2>
    <form action="/rConsulta/<?php echo $rConsulta->id_registroConsulta; ?>" method="POST">
      @csrf
      Tipo de consulta:<br>
      <input type="text" name="tipo_consulta" value="<?php echo $rConsulta->tipo_consulta; ?>" required>
      <br>
      ID Auditoria:<br>
      <input type="text" name="id_auditoria" value="<?php echo $rConsulta->id_auditoria; ?>" required disabled>
      <br>
      Tabla modificada:<br>
      <input type="text" name="tabla_modificada" value="<?php echo $rConsulta->tabla_modificada; ?>" required>
      <br>
      Estado anterior:<br>
      <input type="text" name="estado_anterior" value="<?php echo $rConsulta->estado_anterior; ?>" required>
      <br>
      Estado actual:<br>
      <input type="text" name="estado_actual" value="<?php echo $rConsulta->estado_actual; ?>" required>
      <br>
      ID usuario:<br>
      <input type="text" name="id_usuario" value="<?php echo $rConsulta->id_usuario; ?>" required>
      <br>
      ID modificado:<br>
      <input type="text" name="id_modificado" value="<?php echo $rConsulta->id_modificado; ?>" required>
      <br>
      <input type="submit" value="Submit">
    </form> 
  </body>
</html>  