<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sw)
    {
       if($sw==1){
        $datos=Categoria::all()->where('activo','=',1);
        return view('categoria/index',compact('datos'));
       }else{
        $datos=Categoria::all()->where('activo','=',0);
        return view('categoria/eliminados',compact('datos'));
    }
    }

    public function create()
    {
        return view('categoria.create');
    }


    public function store(Request $request)
    {
        $sala= new Categoria();
        $sala->nombre=$request->nombre;
        $sala->save();

        return redirect(route('categoria.index',1));
    }


    public function show(Categoria $categoria)
    {
        //
    }

    public function buscar(Categoria $categoria)
    {
        return view('categoria.editar',compact('categoria'));

    }


    public function edit(Categoria $categoria)
    {
        return view('categoria.editar',compact('categoria'));
    }


    public function update(Request $request, Categoria $categoria)
    {
        $categoria->nombre=$request->nombre;
        $categoria->update();

        return redirect(route('categoria.index',1));
    }


    public function destroy(Categoria $categoria)
    {
        $categoria->activo=0;
        $categoria->update();
        return redirect(route('categoria.index',1));
    }

    public function restore(Categoria $categoria)
    {
        $categoria->activo=1;
        $categoria->update();
        return redirect(route('categoria.index',0));

    }
}

