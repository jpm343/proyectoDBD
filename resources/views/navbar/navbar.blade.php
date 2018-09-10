<nav class="navbar nav-backgroud navbar-expand-lg navbar-light" id="navbar">
<a class="navbar-brand" href="/">Launching.com</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
  <div class="navbar-nav ml-auto">
    @guest
    <img src=/images/usuario.png class="icono">
    @if (Request::is('*login*'))
    <a class="nav-item nav-link nav-font-style active" href="/login"><b>Iniciar Sesión</b></a>
    @else
    <a class="nav-item nav-link nav-font-style" href="/login">Iniciar Sesión</a>
    @endif
    @else
    <a class="nav-item nav-link" href="/logout"
        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            Cerrar sesión
    </a>
    <img src=/images/usuario.png class="icono">
    @if (Request::is('*perfil*'))
    <a class="nav-item nav-link active" href="perfil"><b>{{ Auth::user()->name }}</b></a>
    @else
    <a class="nav-item nav-link" href="perfil">{{ Auth::user()->name }}</a>
    @endif
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
    @endguest
    <img src=/images/bolsa-de-la-compra.png class="icono">
    @if (Request::is('*carrito*'))
    <a class="nav-item nav-link active" href="/carrito"><b>Mis Compras</b></a>
    @else
    <a class="nav-item nav-link" href="/carrito">Mis Compras</a>
    @endif
  </div>
</nav>

<nav class="navbar nav-backgroud navbar-expand-lg navbar-light">
<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
  <div class="navbar-nav mr-auto">
    @foreach ([
        'alojamientos',
        'vuelos',
        'autos',
        'actividades',
        'traslados',
        'paquetes',
    ] as $route)
    <img src=/images/{{ $route }}.png class="icono">
    @if (Request::is('*'.$route.'*'))
    <a class="nav-item nav-link active" href="/{{ $route }}"><b>{{ ucfirst($route) }}</b></a>
    @else
    <a class="nav-item nav-link" href="/{{ $route }}">{{ ucfirst($route) }}</a>
    @endif
    @endforeach
  </div>
</div>
</nav>
