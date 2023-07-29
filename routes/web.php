<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/index', [ProductosController::class, 'index'])->name('productos.index');
Route::get('/destroy/{id}', [ProductosController::class, 'destroy'])->name('productos.destroy');
Route::get('/edit/{id}', [ProductosController::class, 'edit'])->name('productos.edit');
Route::put('/update/{id}', [ProductosController::class, 'update'])->name('productos.update');
Route::post('/store', [ProductosController::class, 'store'])->name('productos.store');
Route::get('/find', [ProductosController::class, 'find'])->name('productos.find');

Route::get('/indexVentas', [VentasController::class, 'indexVentas'])->name('ventas.indexVentas');
Route::get('/editVentas', [VentasController::class, 'editVentas'])->name('ventas.editVentas');
Route::get('/destroyVentas', [VentasController::class, 'destroyVentas'])->name('ventas.destroyVentas');
Route::get('/nuevaVenta', [VentasController::class, 'nuevaVenta'])->name('ventas.nuevaVenta');
Route::post('/storeVentas', [VentasController::class, 'storeVentas'])->name('ventas.storeVentas');
