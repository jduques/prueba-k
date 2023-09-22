@extends('layouts.app')

@section('content')
                
                <div class="row justify-content-center mt-4">
                <div class="col-8">

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


@endsection

@section('js')

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

@endsection