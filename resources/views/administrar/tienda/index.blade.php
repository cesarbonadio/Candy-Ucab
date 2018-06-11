@extends ('layouts.admin')
@section ('contenido')

<div class="row">
 <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
   <h3> Listado de Tiendas <a href="tienda/create"><button class="btn btn-primary"> Registrar una tienda </button></a></h3>
   @include('administrar.tienda.search')
 </div>
</div>
<br>


<div class="row">
 <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="table-responsive">
     <table class = "table table-striped table-dark">
      <thead>
        <th>Codigo</th>
        <th>Tipo</th>
        <th>Nombre</th>
        <th>Lugar</th>
      </thead>

      @foreach ($tiendas as $tien)

      <tr>
         <td align="center">{{$tien->codigo}}</td>
           <td>{{$tien->tipo}}</td>
           <td>{{$tien->nombre}}</td>
           <td align="center">{{$tien->fk_lugar}}</td>

               <td>
                 <a href="{{URL::action('TiendaController@edit',$tien->codigo)}}"><button class = "btn btn-warning">Editar</button>
                 <a href="{{URL::action('TiendaController@show',$tien->codigo)}}"><button class = "btn btn-success">Ver</button>
                 <a href="" data-target="#modal-delete-{{$tien->codigo}}" data-toggle="modal"><button class = "btn btn-danger">Eliminar</button>
               </td>
      </tr>

      @include('administrar.tienda.modal')

      @endforeach

     <table>
   </div>

 </div>
</div>


@endsection
