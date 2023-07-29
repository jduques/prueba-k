<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Prueba Técnica PHP</title>
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap-5.3.1/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome6/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/personal.css') }}">
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
                                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Inicio</a>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Productos
                              </a>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('productos.index') }}">Lista</a></li>
                                <li><a class="dropdown-item" href="{{ route('productos.edit', 0) }}">Nuevo</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#productoConMayorStock">Producto con mas stock</a></li>
                              </ul>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Ventas
                              </a>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('ventas.indexVentas') }}">Lista</a></li>
                                <li><a class="dropdown-item" href="{{ route('ventas.nuevaVenta') }}">Nuevo</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#productoMasVendido">Producto mas vendido</a></li>
                              </ul>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </nav>

            <div class="row justify-content-center">
                <div class="col-12 col-md-11 mt-3">
                    <div id="" class="card rgba-grey-slight z-depth-2">
                        <div class="card-body p-2">
                            <div class="card z-depth-2">
                                <div class="col-12">
                                    <div class="row card-header text-primary">
                                        <div class="m-0">
                                            <h3>Lista de productos</h3>
                                        
                                        @if (Session::has('success'))
                                            <div class="alert alert-success p-1">
                                                {{ Session::get('success') }}
                                            </div>
                                        @endif

                                        </div>
                                        <div class="card-body p-2">
                                            <div class="table-responsive-xl">
                                            <table id="" class="mt-2 table table-hover table-striped table-bordered nowrap dataTable " role='grid' style="width:100%" cellspacing="0">
                                                <thead class="">
                                                    <tr class="text-center align-middle">
                                                        <th class="py-2 pr-3">Reg</th>
                                                        <th>Nombre</th>
                                                        <th>Categoría</th>
                                                        <th>Referencia</th>
                                                        <th>Precio</th>
                                                        <th>Peso</th>
                                                        <th>Stock</th>
                                                        <th>Editar</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="">
                                                    @foreach($productos as $key => $producto)
                                                    
                                                    <tr class="text-center align-middle">
                                                        <td>{{$key + 1}}</td>
                                                        <td class="text-start"><a href="{{ route('productos.edit', $producto->id) }}"><h5>{{$producto->nombre}}</h5></a></td>
                                                        <td>{{$producto->categoria->nombre}}</td>
                                                        <td>{{$producto->referencia}}</td>
                                                        <td>{{$producto->precio}}</td>
                                                        <td>{{$producto->peso}}</td>
                                                        <td>{{$producto->stock}}</td>
                                                        <td><a href="{{ route('productos.edit', $producto->id) }}">
                                                            <i class="fa-solid fa-pen-to-square fa-fw mr-2 text-success" style="font-size: 21px;"></i></a>
                                                        </td>
                                                        <td><a href="{{ route('productos.destroy', $producto->id) }}">
                                                            <i class="fa-solid fa-trash-can fa-fw mr-2 text-danger" style="font-size: 21px;"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        {!! $productos->links(''); !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                </div>
            </div>
        </div>



        </div>

<!-- Modal -->
<div class="modal fade" id="productoConMayorStock" tabindex="-1" aria-labelledby="productoConMayorStockLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="productoConMayorStockLabel">Producto con mayor Stock</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if($productoConMayorStock)
            <p>ID: {{ $productoConMayorStock->id }}</p>
            <p>Nombre: {{ $productoConMayorStock->nombre }}</p>
            <p>Stock: {{ $productoConMayorStock->stock }}</p>
            <!-- Agrega aquí otros atributos que desees mostrar -->
        @else
            <p>No hay productos en la base de datos.</p>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="productoMasVendido" tabindex="-1" aria-labelledby="productoMasVendidoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="productoMasVendidoLabel">Producto mas vendido</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if($productoMasVendido)
            <p>ID: {{ $productoMasVendido->productos->id }}</p>
            <p>Nombre: {{ $productoMasVendido->productos->nombre }}</p>
            <p>Ventas: {{ $productoMasVendido->total_vendido }}</p>
            <!-- Agrega aquí otros atributos que desees mostrar -->
        @else
            <p>No hay productos en la base de datos.</p>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

        <script type="text/javascript" src="{{ asset('js/personal.js')  }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery-3.7.0.min.js')  }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/bootstrap-5.3.1/js/bootstrap.bundle.min.js')  }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/fontawesome6/js/all.min.js')  }}"></script>
        @if (Session::has('success'))
    <div id="successMessage" class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
        <script>
            // Cerrar el mensaje de éxito automáticamente después de 5 segundos (5000 milisegundos)
            setTimeout(function() {
                document.getElementById('successMessage').style.display = 'none';
            }, 5000);
        </script>
    </body>
</html>
