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
       <tt><h3>Ver detalle producto:   <strong>{{$producto->codigo}}</strong></h3></tt>
    <br>
    <a href="../producto"><button class="btn btn-primary"> volver </button></a>
    <br>
    <br>

    <div class="form-group">
     <p id="tag">Nombre </p>  {{$producto->nombre}}
    </div>

    <div class="form-group">
     <p id="tag">Descripción</p>
     @if ($producto->descripcion)
     {{$producto->descripcion}}
     @else
        ------no info--------
     @endif
    </div>

    <div class="form-group">
     <p id="tag">Precio de venta</p> {{$producto->precio}}
    </div>

    <div class="form-group">
     <p id="tag">Ranking</p>
     @if ($producto->ranking)
     {{$producto->ranking}}
     @else
        ------no info--------
     @endif
    </div>

    <div class="form-group">
     <p id="tag">Foto</p>
     @if ($producto->foto)
     {{$producto->foto}}
     @else
        ------no info--------
     @endif
    </div>

    <div class="form-group">
     <p id="tag">Tipo de producto</p>
     @if ($producto->fk_tipo)
     {{$producto->fk_tipo}}
     @else
        ------no info--------
     @endif
    </div>



     </dic>
   </div>
@stop
