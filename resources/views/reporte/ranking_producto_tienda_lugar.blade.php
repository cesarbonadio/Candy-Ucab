@extends ('layouts.admin')
@section ('contenido')

<a href="../reporte"><button class="btn btn-success">Volver</button></a>

<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h2>Ranking de productos por tienda y lugar &nbsp; &nbsp; </h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover" align="center">

        <thead>
          <th><h3>Nombre tienda</h3></th>
          <th><h3>Nombre producto</h3></th>
          <th><h3>Cantidad vendidos</h3></th>
        </thead>

     @foreach ($tienda as $t)
         <tr>
           <td> <h4>  {{$t->tienda_nombre}}  </h4> </td>
           <td> <h4>  {{$t->nombre_producto}}  </h4> </td>
           <td> <h4>  {{$t->cantidad_vendida}}  </h4> </td>
         </tr>
    @endforeach

        <br>
        <thead>
          <th><h3>Nombre Lugar</h3></th>
          <th><h3>Lugar Codigo</h3></th>
          <th><h3>Nombre producto</h3></th>
          <th><h3>Cantidad vendidoss</h3></th>
        </thead>

     @foreach ($lugar as $l)
         <tr>
           <td><h4> {{$l->lugar_nombre}} </h4></td>
           <td><h4> {{$l->lugar_codigo}} </h4></td>
           <td><h4> {{$l->nombre_producto}} </h4></td>
           <td><h4> {{$l->cantidad_vendida}} </h4></td>
         </tr>
    @endforeach

		</div>
	</div>
</div>
@endsection
