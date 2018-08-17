<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Prueba</title>
</head>
<body>
  Crear:
  <input type="button" onclick=" location.href='/vuelos' " value="Vuelo" name="boton1" />
  <input type="button" onclick=" location.href='/aerolineas' " value="Aerolinea" name="boton2" /> 
  <input type="button" onclick=" location.href='/asientos' " value="Asiento" name="boton3" /> 
  <br>
  Editar:
  <input type="button" onclick=" location.href='/vuelos' " value="Vuelo" name="boton1" />
  <input type="button" onclick=" location.href='/aerolineas' " value="Aerolinea" name="boton2" /> 
  <input type="button" onclick=" location.href='/asientos' " value="Asiento" name="boton3" />
  <br><br> 
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
  <br><br>
  <form action="/action_page.php">
      <div class = "content">
        <div class = "links">
          <a href="{{route('actividad.index')}}"> Lista de actividades</a>
          <a href="{{route('registro.index')}}"> Lista de fondos</a>
          <a href="{{route('fondo.index')}}"> Lista de Registros</a>
        </div> 
      </div>
    </form>
  Crear/Editar:
  <input type="button" onclick=" location.href='/actividads' " value="Actividades" name="bton1" />
  <input type="button" onclick=" location.href='/registros' " value="Registros" name="bton2" /> 
  <input type="button" onclick=" location.href='/fondos' " value="Fondos" name="bton3" /> 
</body>
</html>