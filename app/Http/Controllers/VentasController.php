<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVentaRequest;
use App\Http\Requests\UpdateVentaRequest;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;



class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminatee\Http\Response
     */
    public function indexVentas()
    {
        $ventas = Venta::with('productos')->orderByDesc('created_at')->paginate(10);
        $productoMasVendido = Venta::with('productos')->select('producto_id', DB::raw('SUM(cantidad) as total_vendido'))->groupBy('producto_id')->orderByDesc('total_vendido')->first();
        $productoConMayorStock = Producto::orderByDesc('stock')->first();
        

        return view('ventas', compact('ventas', 'productoConMayorStock', 'productoMasVendido'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVentaRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function storeVentas(Request $request)
    {

        $producto = Producto::find($request->producto);

        if (!is_null($producto)) {
        if ($producto->stock >= $request->venta) {

            $producto->stock = $producto->stock - $request->venta;
            $producto->update(); 

            $venta = New Venta();
            $venta->producto_id = $request->producto;
            $venta->cantidad = $request->venta;
            $venta->precio_total = $producto->precio * $request->venta;
            $venta->save();

            return Redirect::to('indexVentas')->with('success', 'Producto vendido exitosamente: ' . $producto->nombre);
        } else return Redirect::to('indexVentas')->with('danger', 'No hay stock suficiente para realizar la venta: ' . $producto->nombre);
        } else return Redirect::to('indexVentas')->with('danger', 'Debe elegir un producto para la venta!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVentaRequest  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function nuevaVenta()
    {
        $productos = Producto::with('categoria')->orderBy('nombre', 'asc')->get();

        return view('nueva_venta', compact('productos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
