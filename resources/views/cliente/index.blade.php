@extends('layouts.header')

@section('contenido')

<div class="m-2">
    <a href="{{route('cliente.create')}}" class="btn btn-primary">agregar</a>
    <a href="{{route('cliente.index',0)}}" class="btn btn-danger">eliminados</a>
    <a href="{{asset('/')}}" class="btn btn-dark">MENU</a>
</div>
<div class="card ">
    <div class="card-header">
    <h3 class="card-title text-center">LISTA DE CLIENTE</h3>
    </div>
    <div class="card-body">
        <table id="example" class="table table-responsive-xl table-bordered table-sm table-hover table-striped">
            <thead>
                <tr>
                    <th width="20%">Nombre</th>
                    <th width="20%">Telefono</th>
                    <th width="20%">Direccion</th>
                    <th width="10%">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $row)
                <tr>
                    <td>{{$row->nombre}}</td>
                    <td>{{$row->telefono}}</td>
                    <td>{{$row->direccion}}</td>
                    <td class="py-1 align-middle text-center">
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-warning" rel="tooltip" data-placement="top" title="Editar" href="{{route('cliente.buscar',$row->id)}}" >editar</i></a>
                        <a href="{{route('cliente.destroy',$row->id)}}" class="btn btn-danger" rel="tooltip" data-placement="top" title="Eliminar" >eliminar</a>
                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

