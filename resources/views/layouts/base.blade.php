<!DOCTYPE html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="/css/personalizado.css">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <title>@yield('titulo') | Launching.com</title>
        <style>
            .heading {
                background-color: #a85f65; /* #57a09a */
                padding: 15px 0;
                box-shadow: 0 7px 0 0 #703f56; /* #8fc0a9; */
                margin-bottom: 50px;
                -webkit-filter: invert(100%);
                filter: invert(100%);
            }

            body {
                background-image: radial-gradient(#fff, #fffbef, #fff8e2);
            }

            .container input[type=submit], .container button, a.btn {
                background-color: #8fc0a9;
            }

            a.btn {
                color: #212529;
            }

            a {
                color: #57a09a;
            }

            .carousel img {
                border-radius: .375rem;
            }

            .content {
                padding-bottom: 25vh;
            }

            .formulario {
                padding: 15px;
                border: 1px solid #ced4da;
                border-radius: .375rem;
            }

            .formulario .form-control:focus {
                border-color: #74b4af;
                box-shadow: 0 0 0 .2rem #04998d4d;
            }
        </style>
    </head>
    <body>
        <div class="heading">
            <div class="container">
                @include('navbar.navbar')
            </div>
        </div>
        <div class="container content">
            <h1 class="titulo">@yield('titulo')</h1>
            @yield('contenido')
        </div>
    </body>

    <script src="/js/jquery-slim.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</html>
