@extends('layouts.header')

@section('contenido')
    <div class="card ">
        <div class="card-header">
        <h3 class="card-title text-center">LISTA DE PRODUCTOS VENDIDOS</h3>
        </div>
        <div class="card-body">
            <table id="lista" class="table table-responsive-xl table-bordered table-sm table-hover table-striped">
                <thead>
                    <tr>

                        <th width="35%">descripcion</th>
                        <th width="10%">precio</th>
                        <th width="10%">cantidad</th>
                        <th width="10%">sub total</th>

                    </tr>
                </thead>
                <tbody>
                 @php
                     $sum=0;
                 @endphp
                    @foreach ($datos as $row)
                    <tr>
                        <td>{{$row->descripcion}}</td>
                        <td>{{$row->precio_v}}</td>
                        <td>{{$row->cantidad}}</td>
                        <td>{{$row->cantidad*$row->precio_v}}</td>

                    </tr>
                    @php
                     $sum+=$row->precio_v*$row->cantidad;
                    @endphp
                    @endforeach



                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-10">

                </div>
              <div class="col-sm-2">

                <p><b>TOTAL : </b>{{$sum}} bs</p>
              </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <a href="{{route('notaventa.index',1)}}" class="btn btn-primary" >Regresar</a>
        </div>

    </div>

@endsection
