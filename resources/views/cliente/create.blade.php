@extends('layouts.header')

@section('contenido')


<div class="card">
    <div class="card-header">
        <h3 class="card-title text-center">CREAR CLIENTE</h3>
    </div>
    <form  action="{{route('cliente.store')}}" name="CREARCLIENTE" method="POST" novalidate="novalidate">
        @csrf
        <div class="card-body">
            <div class="row">

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nombre ">nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" value="" placeholder="ingrese un nombre" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" name="telefono" class="form-control" id="telefono" value="" placeholder="ingrese telefono" >
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" class="form-control" id="direccion" value="" placeholder="ingrese direccion " >
                    </div>
                </div>
            </div>



        </div>
        <div class="modal-footer justify-content-between">
            <a href="{{route('cliente.index',1)}}" class="btn btn-default" >Regresar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>
</div>



@endsection

