<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Venta;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::with('categoria')->orderBy('nombre', 'asc')->paginate(10);
        $productoMasVendido = Venta::with('productos')->select('producto_id', DB::raw('SUM(cantidad) as total_vendido'))->groupBy('producto_id')->orderByDesc('total_vendido')->first();



        // $productos = Producto::with('categoria')
        //     ->orderBy(function ($query) {
        //         $query->select('nombre')
        //               ->from('categorias')
        //               ->whereColumn('categoria_id', 'categorias.id')
        //               ->orderBy('nombre', 'asc')
        //               ->limit(1);
        //     })
        //     ->orderBy('nombre', 'asc')
        //     ->paginate(10);


        $productoConMayorStock = Producto::orderByDesc('stock')->first();

        //return view('productos')->with('productos', $productos);
        return view('productos', compact('productos', 'productoConMayorStock', 'productoMasVendido'));

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
     * @param  \App\Http\Requests\StoreProductoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $producto = new Producto($request->all());

        if ($request->nombre === null || $request->categoria_id === null || $request->referencia === null || $request->precio === null || $request->peso === null || $request->stock === null) {
            return Redirect::to('/index')->with('success', 'Debe llenar todos los campos para ingresar un nuevo producto!');       
        }
    
        $producto->save();

        return Redirect::to('/index')->with('success', 'Producto creado exitosamente: ' . $request->nombre);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("productos")
                    ->select("productos.id", "productos.nombre", "productos.referencia", "productos.stock", "productos.precio", "categorias.nombre as catnombre")
                    ->join("categorias", "productos.categoria_id", "=", "categorias.id")
                    ->where('productos.nombre', 'LIKE', "%$search%")
                    ->get();
        }
        return $data;
    }

    public function edit($id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::all();

        return view('edit', compact('producto', 'categorias'))->with('id',$id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductoRequest  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     * 
     */
    public function update(Request $request, $id)
    {
        //dd($request->request);
        // dd($id);
        $paciente = Producto::find($id);
        $paciente->fill($request->all());
        $paciente->update();
        return Redirect::to('index')->with('success', 'Producto actualizado exitosamente: ' . $request->nombre);
    }

    public function destroy($id)
    {
        Producto::find($id)->delete();
        return Redirect::to('index');

    }
}
