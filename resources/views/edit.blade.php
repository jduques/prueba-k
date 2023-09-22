@extends('layouts.app')

@section('content')
         
        <div class="row justify-content-center mt-4">
            <div class="col-8">
        @if(isset($producto))
            <?php   $accion = "Editar Producto"; ?>
            <form action="{{ route('productos.update', ['id' => $id]) }}" method="POST">
                @method('PUT')
        @else
            <?php   $accion = "Nuevo Producto"; ?>
            <form action="{{ route('productos.store') }}" method="POST">
        @endif
            @csrf
                        <div class="card z-depth-2">
                            <div class="col-12 px-3 py-1">
                                <div class="row align-items-center card-header text-white bg-warning py-2">
                                    <div class="col-md-12 col-lg-6 h3 m-0 p-0 ta-cl">
                                        <i class="fa-brands fa-product-hunt text-light ml-2"></i>
                                         {{ $accion; }}
                                    </div>
                                </div>
                            </div>

                            <div class="card-body mt-5">
                                <div class="row">
                                    <div class="col-4 mb-4">
                                        <div class="mb-2">
                                            <i class="fa-brands fa-product-hunt"></i>
                                            <label class="text-muted mb-2" for="nombre">Nombre del producto</label>
                                            <input maxlength="64" type="text" name="nombre" id="nombre" oninput="this.value=this.value.slice(0,64)" class="form-control required" value="{{$producto->nombre ?? ''}}" data-placement="top">
                                        </div>
                                    </div>
                                    <div class="col-4 mb-4">
                                        <div class="mb-2">
                                            <i class="fa-brands fa-slack"></i>
                                            <label class="text-muted mb-2" for="fecha">Categoría</label>
                                            <div></div>
                                            <select  class="form-control" name="categoria_id" id="categoria_id">
                                                    <option></option>
                                                @foreach($categorias as $categoria)
                                                    <option value="{{ $categoria->id }}" @if($categoria->id === ($producto->categoria_id ?? null)) selected @endif>{{$categoria->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>

                                    <div class="col-4 mb-4">
                                        <div class="mb-2" >
                                            <i class="fa-solid fa-asterisk"></i>
                                            <label class="text-muted mb-2">Referencia</label>
                                            <input maxlength="8" type="text" id="referencia" name="referencia" oninput="this.value=this.value.slice(0,8)" class="form-control" value="{{$producto->referencia ?? ''}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 mb-4">
                                        <div class="mb-2">
                                            <i class="fa-solid fa-money-bill"></i>
                                            <label class="text-muted mb-2" for="precio">Precio</label>
                                            <input maxlength="3" type="number" id="precio" oninput="this.value=this.value.slice(0,3)" name="precio" class="form-control" value="{{$producto->precio ?? ''}}">

                                        </div>
                                    </div>
                                    <div class="col-4 mb-4">
                                        <div class="mb-2">
                                            <i class="fa-solid fa-weight-scale"></i>
                                            <label class="text-muted mb-2" for="peso">Peso</label>
                                            <input maxlength="3" type="number" name="peso" id="peso" oninput="this.value=this.value.slice(0,3)" class="form-control required peso" value="{{$producto->peso ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="col-4 mb-4">
                                        <div class="mb-2">
                                            <i class="fa-solid fa-box"></i>
                                            <label class="text-muted mb-2" for="stock">Stock</label>
                                            <input maxlength="3" type="number" name="stock" id="stock" oninput="this.value=this.value.slice(0,3)" class="form-control required text-muted" value="{{$producto->stock ?? ''}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="liveAlertPlaceholder"></div>
                            <hr>
                            <div class="col-12 modal-footer justify-content-center mb-3">
                                <button id="onclick" class="btn btn-warning">@if(isset($producto)) Guardar Cambios @else Guardar @endif <i class="fa fa-paper-plane"></i></button>
                            </div>
                        </div>
            {{ html()->form()->close() }}
            </div>
        </div>
           
@endsection
