@extends('layouts.header')

@section('contenido')

<div class="m-2">
    <a href="{{route('categoria.index',1)}}" class="btn btn-danger">Regresar</a>
    <a href="{{asset('/')}}" class="btn btn-dark">MENU</a>
</div>
<div class="card ">
    <div class="card-header">
    <h3 class="card-title text-center">LISTA DE CATEGORIAS ELIMINADAS</h3>
    </div>
    <div class="card-body">
        <table id="example" class="table table-responsive-xl table-bordered table-sm table-hover table-striped">
            <thead>
                <tr>
                    <th width="20%">Nombre</th>
                    <th width="10%">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $row)
                <tr>
                    <td>{{$row->nombre}}</td>
                    <td class="py-1 align-middle text-center">
                    <div class="btn-group btn-group-sm">
                        <a href="{{route('categoria.restore',$row->id)}}" class="btn btn-secondary" rel="tooltip" data-placement="top" title="Restore" >restaurar</a>
                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
