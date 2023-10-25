<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sw)
    {
       if($sw==1){
        $datos=cliente::all()->where('activo','=',1);
        return view('cliente/index',compact('datos'));
       }else{
        $datos=Cliente::all()->where('activo','=',0);
        return view('cliente/eliminados',compact('datos'));
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente= new Cliente();
        $cliente->nombre=$request->nombre;
        $cliente->telefono=$request->telefono;
        $cliente->direccion=$request->direccion;
        $cliente->save();
        return redirect(route('cliente.index',1));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(cliente $cliente)
    {
        return view('cliente.editar',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cliente $cliente)
    {
        $cliente->nombre=$request->nombre;
        $cliente->telefono=$request->telefono;
        $cliente->direccion=$request->direccion;
        $cliente->update();
        return redirect(route('cliente.index',1));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(cliente $cliente)
    {
        $cliente->activo=0;
        $cliente->update();
        return redirect(route('cliente.index',1));
    }
    public function restore(cliente $cliente)
    {
        $cliente->activo=1;
        $cliente->update();
        return redirect(route('cliente.index',0));

    }
}
