@extends('layouts.header')

@section('contenido')

<div class="m-2">
    <a href="{{route('producto.create')}}" class="btn btn-primary">agregar</a>
    <a href="{{route('producto.index',0)}}" class="btn btn-danger">eliminados</a>
    <a href="{{asset('/')}}" class="btn btn-dark">MENU</a>
</div>
<div class="card ">
    <div class="card-header">
    <h3 class="card-title text-center">LISTA DE PRODUCTOS</h3>
    </div>
    <div class="card-body">
        <table id="example" class="table table-responsive-xl table-bordered table-sm table-hover table-striped">
            <thead>
                <tr>

                    <th width="35%">descripcion</th>
                    <th width="10%">precio</th>
                    <th width="15%">stock</th>
                    <th width="10%">categoria</th>
                    <th width="10%">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $row)
                <tr>

                    <td>{{$row->descripcion}}</td>
                    <td>{{$row->precio}}</td>
                    <td>{{$row->stock}}</td>
                    @foreach ($categorias as $item)
                        @if ($item->id==$row->id_categoria)
                        <td>{{$item->nombre}}</td>
                        @endif
                    @endforeach


                    <td class="py-1 align-middle text-center">
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-warning" rel="tooltip" data-placement="top" title="Editar" href="{{route('producto.buscar',$row->id)}}" >editar</i></a>
                        <a href="{{route('producto.destroy',$row->id)}}" class="btn btn-danger" rel="tooltip" data-placement="top" title="Eliminar" >eliminar</a>
                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

