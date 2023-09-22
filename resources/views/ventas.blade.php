@extends('layouts.app')

@section('content')
            <div class="row justify-content-center">
                <div class="col-12 col-md-11 mt-3">
                    <div id="" class="card rgba-grey-slight z-depth-2">
                        <div class="card-body p-2">
                            <div class="card z-depth-2">
                                <div class="col-12">
                                    <div class="row card-header text-danger">
                                        <div class="m-0"><h3>Lista de ventas</h3>
                                            @if (Session::has('success'))
                                            <div class="alert alert-success p-1">
                                                {{ Session::get('success') }}
                                            </div>
                                        @else
                                            <div class="alert alert-danger p-1">
                                                {{ Session::get('danger') }}
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
                                                        <th>Cantidad vendida</th>
                                                        <th>Precio total</th>
                                                        <th>Fecha venta</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="">
                                                    @foreach($ventas as $key => $venta)
                                                    
                                                    <tr class="text-center align-middle">
                                                        <td>{{$key + 1}}</td>
                                                        <td class="text-start text-danger"><h5>{{$venta->productos->nombre}}</h5></td>
                                                        <td>{{$venta->productos->categoria->nombre}}</td>
                                                        <td>{{$venta->cantidad}}</td>
                                                        <td>{{$venta->precio_total}}</td>
                                                        <td>{{$venta->created_at}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        {!! $ventas->links(''); !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
@endsection