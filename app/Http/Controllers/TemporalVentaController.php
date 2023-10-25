<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\TemporalVenta;
use Illuminate\Http\Request;

class TemporalVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insertar($id_producto,$cantidad)
    {   $codigo=session('codigo');
        $data['datos']=$this->cargar_datos_tabla_venta($codigo);
        $existe=TemporalVenta::all()->where('codigo','=',$codigo)->where('id_producto','=',$id_producto)->first();
        if(!isset($existe)){
            $detalle= new TemporalVenta();
            $detalle->codigo=$codigo;
            $p=Producto::all()->where('id','=',$id_producto)->first();
            $detalle->id_producto=$id_producto;
            $detalle->precio_unidad=$p->precio;
            $detalle->cantidad=$cantidad;
            $detalle->subtotal=$p->precio*$cantidad;
            $detalle->save();
        }

        return json_encode($data);
    }

    public function cargar_datos_tabla_venta($codigo)
    {
        $resultado = TemporalVenta::all()->where('codigo','=',$codigo);
        $fila = '';
        $numFila = 0;
        $total=0;
        $r="'";
        foreach ($resultado as $row){
            $producto=Producto::findOrFail($row['id_producto']);
            $numFila++;
            $btn_editar_cant='';
           // $btn_editar_cant.='<div class="input-group input-group-sm mb-0">';
           // $btn_editar_cant.='<input type="number" class="form-control" style="width:25px;" id="iden'.$row['id'].'" name="iden'.$row['id'].'" title="cantidad" value="'.$row['cantidad'].'" min="1" > ';
           // $btn_editar_cant.='<button class="btn btn-success btn-sm btn-flat" type ="button" onclick="modificarCantidad('.$row['id_producto'].','.$row['id'].','.$r.$row['codigo'].$r.')" title="aumentar"><i class="fas fa-plus-circle"></i></button>';
           // $btn_editar_cant.='</div>';

            $fila .= "<tr id='fila".$numFila."'>";
            $fila .= "<td>".$numFila."</td>";
            $fila .= "<td class=\"text-center\" >".$producto->descripcion."</td>";
            $fila .= "<td class=\"text-center\" >".$row['precio_unidad']."</td>";
            $fila .= "<td class=\"text-center\" >".$btn_editar_cant."</td>";
            $fila .= "<td class=\"text-center\" >".number_format($row['subtotal'],2,'.','')."</td>";
            $fila .= "<td ><div class=\"btn-group btn-group-sm \"> 
               
            </div></td>";
            $fila .= "</tr>";
            $total+=$row['subtotal'];
            
        }

        $data['fila']=$fila;
        $data['total']=number_format($total,2,'.','');
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function eliminar(TemporalVenta $temporalVenta)
    {
       $temporalVenta->delete();
       return redirect(asset('detalleventa/index')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TemporalVenta  $temporalVenta
     * @return \Illuminate\Http\Response
     */
    public function show(TemporalVenta $temporalVenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TemporalVenta  $temporalVenta
     * @return \Illuminate\Http\Response
     */
    public function edit(TemporalVenta $temporalVenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TemporalVenta  $temporalVenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TemporalVenta $temporalVenta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TemporalVenta  $temporalVenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(TemporalVenta $temporalVenta)
    {
        //
    }
}
