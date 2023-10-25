@extends('layouts.header')

@section('contenido')

  <div class="mb-2 text-center">
    <a href="{{route('categoria.index',1)}}" class="btn btn-dark"> CATEGORIA</a>
    <a href="{{route('producto.index',1)}}" class="btn btn-dark"> PRODUCTO</a>
    <a href="{{route('cliente.index',1)}}" class="btn btn-dark"> CLIENTE</a>
    <a href="{{route('notaventa.index',1)}}" class="btn btn-dark"> VENTA</a>
  </div>

@endsection

