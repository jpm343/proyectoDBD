<!DOCTYPE html>
<html>
<head>
    <title>Prueba Seed</title>
</head>
<body>
    <form action="/action_page.php">
      
      <div class = "content">
        <div class = "links">
          <a href="{{route('Usuarios.index')}}"> Lista de Usuarios</a>
          <a href="{{route('Rols.index')}}"> Lista de Roles</a>
          <a href="{{route('RegistroConsultas.index')}}"> Lista de Registro_Consulta</a>
        </div> 
      </div>
    </form>
  Crear/Editar:
  <input type="button" onclick=" location.href='/usuarios' " value="Usuarios" name="btn1" />
  <input type="button" onclick=" location.href='/rols' " value="Rols" name="btn2" /> 
  <input type="button" onclick=" location.href='/registroConsultas' " value="Registro Consultas" name="btn3" /> 
  <br>
</body>
</html>