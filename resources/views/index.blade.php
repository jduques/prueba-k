<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Prueba Técnica PHP</title>
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap-5.3.1/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome6/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/css/personal.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->


    </head>
    <body class="bg-dark">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        



        <div class="container-fluid my-3">
            <div class="row justify-content-center">
                <div class="col-12 col-md-11 ">


                    <nav class="navbar bg-dark border-bottom border-body navbar-expand" data-bs-theme="dark">
                      <div class="container-fluid">
                        <a class="navbar-brand" href="#">Prueba/PHP</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Productos
                              </a>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('productos.index') }}">Lista</a></li>
                                <li><a class="dropdown-item" href="{{ route('productos.edit', 0) }}">Nuevo</a></li>

                              </ul>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Ventas
                              </a>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('ventas.indexVentas') }}">Lista</a></li>
                                <li><a class="dropdown-item" href="{{ route('ventas.nuevaVenta') }}">Nuevo</a></li>
                              </ul>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </nav>

                    <div id="body-jugadores" class="card rgba-grey-slight z-depth-2">
                                    <img class="col-12 pl-0 pr-0" src="{{ asset('/imagenes/ventas.jpg') }}" class="img-fluid" alt="...">
                    </div>
                </div>
            </div>
        </div>



        </div>
        <script type="text/javascript" src="{{ asset('public/js/personal.js')  }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/jquery-3.7.0.min.js')  }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/bootstrap-5.3.1/js/bootstrap.bundle.min.js')  }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/fontawesome6/js/all.min.js')  }}"></script>
    </body>
</html>
