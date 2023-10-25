<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\cliente;
use App\Models\DetalleVenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetalleVentaController extends Controller
{

    public function index()
    {
        if(session()->has('codigo')){
            $key=session('codigo');
        }else{
          session(['codigo'=>uniqid()]);
          $key=session('codigo');
        }
        
        $sql="SELECT tv.id, (SELECT p.descripcion FROM productos p WHERE p.id=tv.id_producto) as descripcion

        ,tv.cantidad,tv.precio_unidad,tv.subtotal
        FROM temporal_ventas tv
        WHERE tv.codigo='$key'";
        $datos_temporal=(array) DB::select($sql); 

        $cliente=Cliente::all();
        $producto=Producto::all();

       // $datos=DetalleVenta::all();
        return view('detalleventa/index',compact('cliente','producto','key','datos_temporal'));

    }

   
}
