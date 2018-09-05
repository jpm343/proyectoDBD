<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href=./css/bootstrap.min.css>
    <link rel="stylesheet" href=  ./css/personalizado.css>
    <title>Launching.com - Vuelos</title>
</head>
<body style="background-color:#E6E6FA;">
<script>

function habilitar(checkBoxId,txtFieldId){
    if (document.getElementById(checkBoxId).checked == true){
        document.getElementById(txtFieldId).disabled=true;
    } else {
       document.getElementById(txtFieldId).disabled=false;
    }
  }


</script>
   @include('navbar.navbar')
<div>
  <divclass="container">
    <div class="row">
      <div class="col-sm-6">
        @include('carousel.carousel')
      </div>
    <div>
      <div class="col">
        <form action="" >
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="radio" id="idaVuelta" value="idaVuelta" onclick="habilitar('soloIda','vuelta')">
              Ida y vuelta
            </label>
            <div class="form-check" >
              <label class="form-check-label">
              <input class="form-check-input" type="radio" name="radio" id="soloIda" value="soloIda" onclick="habilitar('soloIda','vuelta')">
              Solo ida
            </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
              <input class="form-check-input" type="radio" name="radio" id="multidestino" value="multidestino" onclick="habilitar('soloIda','vuelta')">
              Multiples destinos
            </label>
            </div>
          </div>

          <div class="form-inline" role="form" class="form-group">
            <label for="CiudadO">Ciudad origen: </label>
            <input type="text" class="form-control" name="CiudadO" placeholder="Ingrese ciudad origen">         
            
            <label for="CiudadD">Ciudad destino: </label>
            <input type="text" class="form-control" name="CiudadD" placeholder="Ingrese Ciudad destino">
          </div>
          <div class="form-inline" class="form-group">
            <label for="ida">Fecha de ida: </label>
            <input id="ida" class="form-control" type="date" name="fechaIda">
          
            <label for="vuelta">Fecha de regreso: </label>
            <input id="vuelta" class="form-control" type="date" name="fechaVuelta">
          </div>
          <!--div class="checkbox">
            <label><input type="checkbox" id="cBoxFecha" onclick="habilitar('cBoxFecha','ida'),habilitar('cBoxFecha','vuelta')"> Aun no decido fechas</label></div-->
            <div class="form-inline">
            <label>Cantidad de adultos</label>
            <select  class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
            <label>Cantidad de menores</label>
            <select  class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select></div>
            <div><label>Clase de boleto </label></div>
          
          <div class="form-check form-check-inline">      
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="boleto" id="turista" value="turista" checked>
              Turista
            </label>
            <div class="form-check" >
              <label class="form-check-label">
              <input class="form-check-input" type="radio" name="boleto" id="ejecutivo" value="ejecutivo">
              Ejecutivo
            </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
              <input class="form-check-input" type="radio" name="boleto" id="primeraClase" value="primeraClase">
              Primera clase
            </label>
            </div>
          </div>
          <div >
            <input type="submit" class="btn btn-info" value="Buscar Vuelos">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</body>

<script src="./js/jquery-slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>

</html>