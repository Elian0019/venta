@extends('layouts.header')

@section('contenido')


    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-center">EDITAR CATEGORIA</h3>
        </div>
        <form  action="{{route('categoria.update',$categoria->id)}}" method="POST" novalidate="novalidate">
            @csrf
            <input type="hidden" name="id_categoria" id="id_categoria" value="{{$categoria->id}}">
            <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nombre" >Nombre</label>
                                <input type="text" name="nombre" class="form-control" id="nombre" value="{{$categoria->nombre}}" placeholder="ingrese el nombre de la categoria" >
                            </div>
                        </div>

                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <a href="{{route('categoria.index',1)}}" class="btn btn-default" >Regresar</a>
                <button type="submit" class="btn btn-success">Actualizar</button>
            </div>
        </form>
    </div>
@endsection

