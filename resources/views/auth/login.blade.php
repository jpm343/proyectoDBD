<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/personalizado.css">
    <title>Launching.com</title>
</head>

<body>
    <div class="container">
        @include('navbar.navbar')
        <div class="row">
            <div class="col-md-6 offset-md-4">
                <h2>Iniciar sesión</h2>
            </div>
        </div>

        <form method="POST" action="{{ route('login') }}" aria-label="Iniciar sesión">
            @csrf

            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label text-md-right">Correo electrónico:</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña:</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            Recordarme
                        </label>
                    </div>
                </div>

                <div class="col-md-2">
                    <a class="form-check-label" href="{{ route('register') }}">
                        No tengo una cuenta
                    </a>
                </div>

                <div class="col-md-2" style="text-align: right">
                    <a class="form-check-label" href="{{ route('password.request') }}">
                        Olvidé mi contraseña
                    </a>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-default">
                        Iniciar sesión
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>

<script src="./js/jquery-slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>

</html>
