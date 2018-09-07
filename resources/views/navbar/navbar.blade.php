<nav class="navbar navbar-expand-lg navbar-light" id="navbar" float="left">

  <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
      <img src=/images/usuario.png class="icono"> 
        <a class="nav-item nav-link active" href="#">Iniciar Sesión</a>
      <img src=/images/bolsa-de-la-compra.png class="icono">
        <a class="nav-item nav-link" href="#">Mis Compras</a>
      <img src=/images/info.png class="icono">
        <a class="nav-item nav-link" href="#">Ayuda</a>
    </div>
<nav class="navbar navbar-expand-lg navbar-light" id="navbar">
<a class="navbar-brand" href="#">Navbar</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
  <div class="navbar-nav ml-auto">
    @guest
    <img src=/images/usuario.png class="icono">
    <a class="nav-item nav-link active" href="/login">Iniciar Sesión</a>
    @else
    <img src=/images/usuario.png class="icono">
    <a class="nav-item nav-link active" href="/logout"
        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            {{ Auth::user()->name }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
    @endguest
    <img src=/images/bolsa-de-la-compra.png class="icono">
    <a class="nav-item nav-link" href="#">Mis Compras</a>
    <img src=/images/info.png class="icono">
    <a class="nav-item nav-link" href="#">Ayuda</a>
  </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light" float="left">
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav mr-auto">
      <img src=/images/hotel.png class="icono"> 
        <a class="nav-item nav-link active" href="#">Alojamientos</a>
      <img src=/images/transporte-aereo.png class="icono">
        <a class="nav-item nav-link" href="#">Vuelos</a>
      <img src=/images/bicicleta.png class="icono">
        <a class="nav-item nav-link" href="#">Actividades</a>
      <img src=/images/taxi.png class="icono"> 
        <a class="nav-item nav-link active" href="{{route('Traslado.index', 'TrasladoController')}}">Traslados</a>
      <img src=/images/bolsa-de-la-compra.png class="icono">
        <a class="nav-item nav-link" href="#">Paquetes</a>
      <img src=/images/etiqueta.png class="icono">
        <a class="nav-item nav-link" href="#">Promociones</a>
    </div>
  </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light">
<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
  <div class="navbar-nav mr-auto">
    <img src=/images/hotel.png class="icono"> 
    <a class="nav-item nav-link active" href="#">Alojamientos</a>
    <img src=/images/transporte-aereo.png class="icono">
    <a class="nav-item nav-link" href="/vuelos">Vuelos</a>
    <img src=/images/auto.png class="icono">
    <a class="nav-item nav-link" href="/autos">Autos</a>
    <img src=/images/bicicleta.png class="icono">
    <a class="nav-item nav-link" href="/actividades">Actividades</a>
    <img src=/images/taxi.png class="icono"> 
    <a class="nav-item nav-link active" href="#">Traslados</a>
    <img src=/images/bolsa-de-la-compra.png class="icono">
    <a class="nav-item nav-link" href="#">Paquetes</a>
    <img src=/images/etiqueta.png class="icono">
    <a class="nav-item nav-link" href="#">Promociones</a>
  </div>
</div>
</nav>