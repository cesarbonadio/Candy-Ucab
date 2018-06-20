@extends ('layouts.admin')
@section ('contenido')

<style>
 #tag{
   font-size: 20px;
   font-weight: 600;
 }
</style>

   <div class="row">
     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
       <tt><h3>Ver detalle Tienda:<strong>{{$tienda->codigo}}</strong></h3></tt>
    <br>
    <a href="../tienda"><button class="btn btn-primary">volver</button></a>
    <br>
    <br>

    <div class="form-group">
     <p id="tag">Nombre</p>{{$tienda->nombre}}
    </div>

    <div class="form-group">
     <p id="tag">Tipo</p>{{$tienda->tipo}}
    </div>

    <div class="form-group">
     <p id="tag">Ubicacion</p>{{$lugar->nombre}}
    </div>


     </dic>
   </div>
@stop
