<!DOCTYPE html>
<html>
  <head>
	 <title>Actividades</title>
  </head>
  <body>
	 <h2> Actividades </h2>
    <form action="/actividads/<?php echo $actividad->id_actividad; ?>" method="post">
      @csrf
      Nombre de la actividad:<br>
      <input type="text" name="nombre_actividad" value="<?php echo $actividad->nombre_actividad; ?>" required>
      <br>
      ID actividad:<br>
      <input type="text" name="id_actividad" value="<?php echo $actividad->id_actividad; ?>" required disabled>
      <br>
      Puntuacion actividad:<br>
      <input type="text" name="puntuacion_actividad" value="<?php echo $actividad->puntuacion_actividad; ?>" required>
      <br>
      Descripcion de la actividad:<br>
      <input type="text" name="descripcion_actividad" value="<?php echo $actividad->descripcion_actividad; ?>" required>
      <br>
      Ciudad de la actividad:<br>
      <input type="text" name="ciudad_actividad" value="<?php echo $actividad->ciudad_actividad; ?>" required>
      <br>
      Pais de la actividad:<br>
      <input type="text" name="pais_actividad" value="<?php echo $actividad->pais_actividad; ?>" required>
      <br>
      Dias disponibles:<br>
      <input type="text" name="dias_disponibles" value="<?php echo json_encode($actividad->dias_disponibles); ?>" required>
      <br>
      Hora de inicio:<br>
      <input type="text" name="hora_inicio" value="<?php echo $actividad->hora_inicio; ?>" required>
      <br>
      Hora de fin:<br>
      <input type="text" name="hora_fin" value="<?php echo $actividad->hora_fin; ?>" required>
      <br>
      <input type="submit" value="Submit">
    </form> 
  </body>
</html> 