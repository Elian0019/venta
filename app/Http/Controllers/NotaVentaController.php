<?php

namespace App\Http\Controllers;
use App\Models\cliente;
use App\Models\DetalleVenta;
use App\Models\NotaVenta;
use App\Models\Producto;
use App\Models\TemporalVenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotaVentaController extends Controller
{
    public function index($sw)
    {
        $cliente=Cliente::all();
       if($sw==1){
        $datos=NotaVenta::all()->where('activo','=',1);
        return view('venta/index',compact('datos','cliente'));
       }else{
        $datos=NotaVenta::all()->where('activo','=',0);
        return view('venta/eliminados',compact('datos','cliente'));
       }
    }

    public function detalle($id_nota){
        $sql="SELECT p.descripcion,dv.cantidad,dv.precio_v
        FROM detalle_ventas dv,nota_ventas nv ,productos p
        WHERE dv.id_notaventa=nv.id AND
        dv.id_producto=p.id AND
        nv.id=$id_nota";
        $datos=(array) DB::select($sql);
        return view('venta/detalle',compact('id_nota','datos'));
    }
    public function destroy(NotaVenta $id_notaventa)
    {
        $id_notaventa->activo=0;
        $id_notaventa->update();
        return redirect(route('notaventa.index',1));
    }

    public function guardar($id_cliente){
        $data['error']=0;
        $data['mensaje']='';
        $nota= new NotaVenta();
        $nota->fecha=date("y-m-d");
        $nota->monto=0;
        $nota->id_cliente=$id_cliente;
        $nota->save();
        $codigo=session('codigo');
        $sql="SELECT tv.id_producto,tv.cantidad,tv.precio_unidad,tv.subtotal
        FROM temporal_ventas tv
        WHERE tv.codigo='$codigo'";

        $datos_temporal=(array) DB::select($sql);
        $sw=0;
        foreach ($datos_temporal as $row){
            $p=Producto::findOrFail($row->id_producto);
            if($p->stock < $row->cantidad){
                $sw=1;
            }
        }
        if($sw==1){
            $nota->delete();
            $data['error']=1;
            $data['mensaje']='no se pudo realizar la venta debido al stcok insuficiente';
            return json_encode($data);
        }else{
            $sum=0;
            foreach ($datos_temporal as $row){
                $detalle= new DetalleVenta();
                $detalle->id_producto=$row->id_producto;
                $detalle->id_notaventa=$nota->id;
                $detalle->cantidad=$row->cantidad;
                $detalle->precio_v=$row->precio_unidad;
                $detalle->save();
                $sum+=($row->cantidad*$row->precio_unidad);
                $p=Producto::findOrFail($row->id_producto);
                $p->stock=$p->stock-$row->cantidad;
                $p->update();
            }
            $nota->monto=$sum;

            $nota->update();
            TemporalVenta::where('codigo','=', $codigo)->delete();
           // session(['codigo'=>null]);
           // session('codigo')=null;
            return json_encode($data);
        }
    }
}
