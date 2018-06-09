@extends ('layouts.admin')
@section ('contenido')

<div class="row">
 <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
   <h3> Listado de Productos <a href="producto/create"><button class="btn btn-primary"> Crear un producto </button></a></h3>
   @include('administrar.producto.search')
 </div>
</div>
<br>

<div class="row">
 <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="table-responsive">
     <table class = "table table-striped table-dark">
      <thead>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Ranking</th>
        <th>Foto</th>
        <th>Tipo producto</th>
        <th>Opciones</th>
      </thead>



      @foreach ($productos as $pro)

      <tr>
         <td align="center">{{$pro->codigo}}</td>
           <td>{{$pro->nombre}}</td>

           @if (strlen($pro->descripcion)<=40)
           <td>{{$pro->descripcion}}</td>
           @else
          <td>{{substr($pro->descripcion,0,strlen($pro->descripcion)/3)}}...</td>
           @endif

          <td>{{$pro->precio}}</td>
          <td align="center"> {{$pro->ranking}} </td>
          <td>{{$pro->foto}}</td>
          <td align="center">{{$pro->fk_tipo}}</td>

               <td>
                 <a href="{{URL::action('ProductoController@edit',$pro->codigo)}}"><button class = "btn btn-warning">Editar</button>
                 <a href="{{URL::action('ProductoController@show',$pro->codigo)}}"><button class = "btn btn-success">Ver</button>
                 <a href="" data-target="#modal-delete-{{$pro->codigo}}" data-toggle="modal"><button class = "btn btn-danger">Eliminar</button>
               </td>
      </tr>

      @include('administrar.producto.modal')

      @endforeach

     <table>
   </div>

 </div>
</div>


@endsection
