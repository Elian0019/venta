@extends('layouts.header')

@section('contenido')


    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-center">EDITAR PRODUCTO</h3>
        </div>
        <form  action="{{route('producto.update',$producto->id)}}" method="POST" novalidate="novalidate">
            @csrf
            <input type="hidden" name="id_producto" id="id_producto" value="{{$producto->id}}">
            <div class="card-body">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="descripcion ">Descripcion</label>
                                <input type="text" name="descripcion" class="form-control" id="descripcion" value="{{$producto->descripcion}}" placeholder="ingrese una descripcion" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input type="number" name="precio" class="form-control" id="precio" value="{{$producto->precio}}" placeholder="ingrese precio" >
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="stock">stock</label>
                                <input type="number" name="stock" class="form-control" id="stock" value="{{$producto->stock}}" placeholder="ingrese stock" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="id_categoria">Categoria</label>
                                <select name="id_categoria" id="id_categoria" class="form-control" >
                                    @foreach ($categorias as $row)
                                        <option @if ($row->id==$producto->id_categoria) {{'selected'}} @endif value="{{$row->id}}">{{$row->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <a href="{{route('producto.index',1)}}" class="btn btn-default" >Regresar</a>
                <button type="submit" class="btn btn-success">Actualizar</button>
            </div>
        </form>
    </div>
@endsection

