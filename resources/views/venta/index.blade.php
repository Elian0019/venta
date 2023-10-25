@extends('layouts.header')

@section('contenido')

<div class="m-2">
    <a href="{{route('detalleventa.index')}}" class="btn btn-primary">Vender</a>
    <a href="{{route('producto.index',0)}}" class="btn btn-danger">Ventas Eliminadas</a>
    <a href="{{asset('/')}}" class="btn btn-dark">MENU</a>
</div>
<div class="card ">
    <div class="card-header">
    <h3 class="card-title text-center">LISTA DE VENTAS REALIZADAS</h3>
    </div>
    <div class="card-body">
        <table id="example" class="table table-responsive-xl table-bordered table-sm table-hover table-striped">
            <thead>
                <tr>

                    <th width="13%">Cliente</th>
                    <th width="10%">Fecha</th>
                    <th width="15%">Total</th>

                    <th width="15%">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $row)
                <tr>
                    @foreach ($cliente as $item)
                        @if ($item->id==$row->id_cliente)
                        <td>{{$item->nombre}}</td>
                        @endif
                    @endforeach

                    <td>{{$row->fecha}}</td>
                    <td>{{$row->monto}}</td>



                    <td class="py-1 align-middle text-center">
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-warning" rel="tooltip" data-placement="top" title="Editar" href="{{route('notaventa.detalle',$row->id)}}" >ver</i></a>
                        <a href="{{route('notaventa.destroy',$row->id)}}" class="btn btn-danger" rel="tooltip" data-placement="top" title="Eliminar" >eliminar</a>
                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

