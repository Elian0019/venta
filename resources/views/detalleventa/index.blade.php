@extends('layouts.header')

@section('contenido')
    <input class="form-control" type="text" name="codigo_venta" id="codigo_venta" value="{{$key}}">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-center">DETALLES DE VENTA</h3>
        </div>

            <div class="card-body">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="categoria ">Categoria</label>
                                <input type="text" name="categoria" class="form-control" id="categoria" value=""  />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input type="number" name="precio" class="form-control" id="precio" value=""  >
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="stock">Cantidad</label>
                                <input type="number" name="stock" class="form-control" id="stock" value="" placeholder="ingrese cantidad" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="id_producto">Producto</label>
                                <select onchange="buscar(this.value)" name="id_producto" id="id_producto" class="form-control" >
                                    <option disabled selected value="">seleccione un producto</option>
                                    @foreach ($producto as $item)
                                        <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">

                <button  onclick="agregarProducto(id_producto.value,stock.value)" class="btn btn-success">agregar</button>
            </div>

    </div>
    <div class="card ">
        <div class="card-header">
        <h3 class="card-title text-center">LISTA DE PRODUCTOS A VENDER</h3>
        </div>
        <div class="card-body">
            <table id="lista" class="table table-responsive-xl table-bordered table-sm table-hover table-striped">
                <thead>
                    <tr>

                        <th width="35%">descripcion</th>
                        <th width="10%">precio</th>
                        <th width="15%">Cantidad</th>
                        <th width="10%">sub total</th>
                        <th width="10%">Acción</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($datos_temporal as $row)
                    <tr>

                        <td>{{$row->descripcion}}</td>
                        <td>{{$row->precio_unidad}}</td>
                        <td>{{$row->cantidad}}</td>
                        <td>{{$row->subtotal}}</td>



                        <td class="py-1 align-middle text-center">
                        <div class="btn-group btn-group-sm">
                            <a class="btn btn-sm btn-danger" href="{{asset('TemporalVenta/eliminar')}}/{{$row->id}}">eliminar</a>
                        </div>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
        <div class="modal-footer justify-content-between">
            <a href="{{route('notaventa.index',1)}}" class="btn btn-primary" >Regresar</a>
            <select class="form-control" name="id_cliente" id="id_cliente">
                <option disabled selected value="">seleccione un cliente</option>
                @foreach ($cliente as $item)
                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                @endforeach
            </select>
            <button type="button" onclick="guardar(id_cliente.value)" class="btn btn-success">Guardar compra</button>
        </div>

    </div>

@endsection

<script>

    function guardar(id_cliente) {
        if(id_cliente != ''){
        var url='{{asset('')}}notaventa/guardar/'+id_cliente;
          $.ajax({
              url:url,dataType: 'json',
              success: function(resultado){
                if(resultado.error==1){
                    alert(resultado.mensaje);
                }else{

                }
                location.reload();

               // update_tabla();
              }
            });
        }else{
            alert('error de datos');
        }
    }

    function buscar(id_producto) {
        if(id_producto != ''){
        var url='{{asset('')}}producto/buscarp/'+id_producto;
          $.ajax({
              url:url,dataType: 'json',
              success: function(resultado){
               $('#categoria').val(resultado.nombre_categoria);
               $('#precio').val(resultado.producto.precio);
               // update_tabla();
              }
            });
        }else{
            alert('error de datos');
        }
    }

    function agregarProducto(id_producto,cantidad) {
        if(id_producto != '' && cantidad != '' ){
        var url='{{asset('')}}TemporalVenta/insertar/'+id_producto+'/'+cantidad;
          $.ajax({
              url:url,dataType: 'json',
              success: function(resultado){
                location.reload();
                //$("#lista tbody").empty();
               // $("#lista tbody").append(resultado.datos);
               // update_tabla();
              }
            });
        }else{
          //  alert('error de datos');
        }
    }
</script>
