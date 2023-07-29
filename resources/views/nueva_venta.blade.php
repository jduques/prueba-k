<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Prueba Técnica PHP</title>
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome6/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap-5.3.1/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/personal.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->


    </head>
    <body class="bg-dark">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">


        
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-11 col-md-10 col-lg-5">
                <div class="card rgba-grey-slight z-depth-2">
                    <div class="card-body p-2">
                        
                    <form action="{{ route('ventas.storeVentas') }}" method="POST">
                        @csrf
                        <div class="card z-depth-2">
                            <div class="col-12 px-3 py-1">
                                <div class="row align-items-center card-header text-white bg-warning py-2">
                                    <div class="col-md-12 col-lg-6 h3 m-0 p-0 ta-cl">
                                        <i class="fa-brands fa-product-hunt text-light ml-2"></i>
                                         Nueva Venta
                                    </div>
                                </div>
                            </div>

                            <div class="card-body mt-5">
                                <div class="row">

                                    <div class="col-10 mb-4">
                                        <div class="mb-2">
                                            <i class="fa-brands fa-slack"></i>
                                            <label class="text-muted mb-2" for="fecha">Nombre del producto</label>
                                            <div></div>
                                                <select class="select2-producto required" name="producto" id="producto" data-placement="top"><option></option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
       
                                    <div class="col-4 mb-4">
                                        <div class="mb-2">
                                            <i class="fa-solid fa-box"></i>
                                            <label class="text-muted mb-2" for="stock">Cantidad a vender</label>
                                            <input maxlength="3" type="number" name="venta" id="venta" oninput="this.value=this.value.slice(0,3)" class="form-control required text-muted" value="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-12 modal-footer justify-content-center mb-3">
                                <button id="onclick" class="btn btn-warning">Vender <i class="fa fa-paper-plane"></i></button>
                            </div>
                        </div>
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


        </div>
        <script type="text/javascript" src="{{ asset('js/personal.js')  }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery-3.7.0.min.js')  }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/fontawesome6/js/all.min.js')  }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/bootstrap-5.3.1/js/bootstrap.min.js')  }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/select2/js/select2.full.min.js')  }}"></script>
        <script type="text/javascript">
        
        $('.select2-producto').select2({
        minimumInputLength: 2,
        ajax: {
            url: 'find',
            dataType: 'json',
            delay: 250,
            data: function (params) { return { q: params.term, page: params.page };},
            processResults: function (data, params) {
                params.page = params.page || 1;
                return {
                    results: $.map(data, function (item) { return { text: item.nombre + " / " + item.catnombre + " | Stock: " + item.stock + " | Precio: " + item.precio, id: item.id, precio: item.precio }}),
                    pagination: { more: (params.page * 30) < data.total_count }
                };
            },
            cache: true
        },
        placeholder: "Buscar por nombre del producto",
        width: "element",
        allowClear: true,
        width: '100%'
    });
        </script>
    </body>
</html>
