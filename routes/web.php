<?php
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\NotaVentaController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\TemporalVentaController;
use App\Models\Categoria;
use App\Models\cliente;
use App\Models\TemporalVenta;
use Illuminate\Support\Facades\Route;

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
    //return view('welcome');
    return view('index');
   // return redirect(route('paciente.index',1));
});

Route::controller(ProductoController::class)->group(function (){
    Route::get('producto/create','create')->name('producto.create');
   Route::post('producto/store','store')->name('producto.store');
    Route::get('producto/{sw}','index')->name('producto.index');
    Route::get('producto/buscar/{producto}','edit')->name('producto.buscar');
   Route::post('producto/update/{producto}','update')->name('producto.update');
   Route::get ('producto/destroy/{producto}','destroy')->name('producto.destroy');
   Route::get ('producto/restore/{producto}','restore')->name('producto.restore');
   Route::get ('producto/buscarp/{producto}','buscar')->name('producto.buscarp');
});
Route::controller(CategoriaController::class)->group(function (){
    Route::get('categoria/create','create')->name('categoria.create');
   Route::post('categoria/store','store')->name('categoria.store');
   Route::get('categoria/{sw}','index')->name('categoria.index');
    Route::get('categoria/buscar/{categoria}','edit')->name('categoria.buscar');
   Route::post('categoria/update/{categoria}','update')->name('categoria.update');
   Route::get ('categoria/destroy/{categoria}','destroy')->name('categoria.destroy');
   Route::get ('categoria/restore/{categoria}','restore')->name('categoria.restore');
});
Route::controller(ClienteController::class)->group(function (){
   Route::get('cliente/create','create')->name('cliente.create');
   Route::post('cliente/store','store')->name('cliente.store');
   Route::get('cliente/{sw}','index')->name('cliente.index');
    Route::get('cliente/buscar/{cliente}','edit')->name('cliente.buscar');
   Route::post('cliente/update/{cliente}','update')->name('cliente.update');
   Route::get ('cliente/destroy/{cliente}','destroy')->name('cliente.destroy');
   Route::get ('cliente/restore/{cliente}','restore')->name('cliente.restore');
});
Route::controller(NotaVentaController::class)->group(function (){
   // Route::get('notaventa/create','create')-> name('notaventa.create');
   //Route::post('notaventa/store','store')->name('notaventa.store');
   Route::get('notaventa/guardar/{id_cliente}','guardar')-> name('notaventa.guardar');
    Route::get('notaventa/{sw}','index')->name('notaventa.index');
    Route::get('notaventa/detalle/{id_notaventa}','detalle')->name('notaventa.detalle');
    //Route::post('notaventa/update/{cliente}','update')->name('notaventa.update');
    Route::get ('notaventa/destroy/{id_notaventa}','destroy')->name('notaventa.destroy');
    //Route::get ('notaventa/restore/{cliente}','restore')->name('notaventa.restore');
 });
 Route::controller(DetalleVentaController::class)->group(function (){
    Route::get('detalleventa/create','create')-> name('detalleventa.create');
   Route::post('detalleventa/store','store')->name('detalleventa.store');
    Route::get('detalleventa/index','index')->name('detalleventa.index');
     Route::get('detalleventa/buscar/{detalleventa}','edit')->name('detalleventa.buscar');
    Route::post('detalleventa/update/{detalleventa}','update')->name('detalleventa.update');
    Route::get ('detalleventa/destroy/{detalleventa}','destroy')->name('detalleventa.destroy');
    Route::get ('detalleventa/restore/{detalleventa}','restore')->name('detalleventa.restore');
 });

 Route::controller(TemporalVentaController::class)->group(function (){
   Route::get('TemporalVenta/insertar/{id_producto}/{cantidad}','insertar')->name('TemporalVenta.insertar');
   Route::get('TemporalVenta/eliminar/{temporalVenta}','eliminar')->name('TemporalVenta.eliminar');
   //Route::get('TemporalVenta/aumentar/{id_producto}/{id_almacen}/{codigo}/{cantidad}','aumentar_cantidad')->name('TemporalVenta.aumentar');
   //Route::get('TemporalVenta/reducir/{id_producto}/{id_almacen}/{codigo}/{cantidad}','reducir_cantidad')->name('TemporalVenta.reducir');
   //Route::get('TemporalVenta/updatecantidad/{id_producto}/{id_almacen}/{codigo}/{cantidad}','modificar_cantidad')->name('TemporalVenta.updatecantidad');
   //Route::get('TemporalVenta/eliminar/{id_producto}/{id_almacen}/{codigo}','eliminar_producto')->name('TemporalVenta.eliminar');
   //Route::post('TemporalVenta/guardar','guardar_venta')->name('TemporalVenta.guardar');
   //Route::get('TemporalVenta/datos/{codigo}','get_datos')->name('TemporalVenta.datos');
   //Route::get('TemporalVenta/show','show')->name('TemporalVenta.show')->middleware('can:nota.venta');
   //Route::get('TemporalVenta/destroy','destroy')->name('TemporalVenta.destroy');
});
