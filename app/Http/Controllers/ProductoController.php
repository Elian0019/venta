<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sw)
    {
        $categorias=Categoria::all();
       if($sw==1){
        $datos=Producto::all()->where('activo','=',1);
        return view('producto/index',compact('datos','categorias'));
       }else{
        $datos=Producto::all()->where('activo','=',0);
        return view('producto/eliminados',compact('datos','categorias'));
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Categoria::all()->where('activo','=',1);
        return view('producto/create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto= new Producto();
        $producto->descripcion=$request->descripcion;
        $producto->precio=$request->precio;
        $producto->stock=$request->stock;
        $producto->id_categoria=$request->id_categoria;
        $producto->save();
        return redirect(route('producto.index',1));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    { $categorias=Categoria::all()->where('activo','=',1);
      return view('producto/editar',compact('producto','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {

        $producto->descripcion=$request->descripcion;
        $producto->precio=$request->precio;
        $producto->stock=$request->stock;
        $producto->id_categoria=$request->id_categoria;
        $producto->update();
        return redirect(route('producto.index',1));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->activo=0;
        $producto->update();
        return  redirect(route('producto.index',1));
    }
    public function restore(Producto $producto)
    {
        $producto->activo=1;
        $producto->update();
        return  redirect(route('producto.index',0));
    }
    public function buscar(Producto $producto)
    {     /*$categorias=Categoria::all();
        return view('producto.editar',compact('producto',('categorias')));*/
        $categoria=Categoria::all()->where('id','=',$producto->id_categoria)->first();
        $nombre_categoria=$categoria->nombre;
        $data['producto']=$producto;
        $data['nombre_categoria']=$nombre_categoria;
        return json_encode($data);
    }
}
