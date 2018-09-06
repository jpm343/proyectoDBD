<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href=/css/bootstrap.min.css>
    <link rel="stylesheet" href=/css/personalizado.css>
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

function agregarDestino(id){
  document.getElementById(id).style.display="block";
}

function eliminarDestino(id){
  document.getElementById(id).style.display="none";
}

</script>
   @include('navbar.navbar')
<div>
  <div class="row">
    <div class="col-5">
      @include('carousel.carousel')
    </div>
    <div>
      <div class="col">
        <center><h2>Encuentra tu vuelo</h2></center>
        @csrf
        <form action="/vuelos_buscar" method="get">
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="viajes" id="idaVuelta" value="idaVuelta" onclick="habilitar('soloIda','vuelta'),agregarDestino('destinoUnico'),eliminarDestino('multiDestino')" checked="true"> Ida y vuelta
            </label>
            <div class="form-check" >
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="viajes" id="soloIda" value="soloIda" onclick="habilitar('soloIda','vuelta'),agregarDestino('destinoUnico'),eliminarDestino('multiDestino')"> Solo ida
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="viajes" id="multidestino" value="multidestino" onclick="habilitar('soloIda','vuelta'),eliminarDestino('destinoUnico'),agregarDestino('multiDestino')"> Multiples destinos
              </label>
            </div>
          </div>
          <!-- DESTINO UNICO, SOLO IDA O IDA Y VUELTA-->
          <div id=destinoUnico>
            <div class="form-inline" role="form" class="form-group">
              <label>Ciudad origen: </label>
              <input type="text" class="form-control" name="origen" placeholder="Ingrese ciudad origen">
              <label>Ciudad destino: </label>
              <input type="text" class="form-control" name="destino" placeholder="Ingrese Ciudad destino">
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
              <select id="cAdulto" class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
              </select>
              <label>Cantidad de menores</label>
              <select id="cMenor" class="form-control">
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
              </select>
            </div>
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
          </div>
          <!-- DESTINO MULTIPLE-->
          <div id=multiDestino style="display:none" >
            <label>Tramo 1</label>
            <div class="form-inline" role="form" class="form-group">
              <label for="CiudadOrigen1">Ciudad origen: </label>
              <input type="text" class="form-control" name="CiudadO" placeholder="Ingrese ciudad origen">
              <label for="CiudadDestino1">Ciudad destino: </label>
              <input type="text" class="form-control" name="CiudadD" placeholder="Ingrese Ciudad destino">
            </div>
            <div class="form-inline" class="form-group">
              <label for="ida1">Fecha de ida: </label>
              <input id="ida1" class="form-control" type="date" name="fechaIda1">     
            </div>
            <label>Tramo 2</label>
            <div class="form-inline" role="form" class="form-group">
              <label for="CiudadOrigen2">Ciudad origen: </label>
              <input type="text" class="form-control" name="CiudadO" placeholder="Ingrese ciudad origen">
              <label for="CiudadDestino2">Ciudad destino: </label>
              <input type="text" class="form-control" name="CiudadD" placeholder="Ingrese ciudad destino">
            </div>
            <div class="form-inline" class="form-group">
              <label for="ida2">Fecha de ida: </label>
              <input id="ida2" class="form-control" type="date" name="fechaIda2">     
            </div>
            <div>
              
            </div>
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
          </div>
          <button class="btn btn-info" type="submit" onclick="check()">Buscar</button>
        </form>
      </div>
    </div>
</div>

</body>

<script src="./js/jquery-slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>

</html>