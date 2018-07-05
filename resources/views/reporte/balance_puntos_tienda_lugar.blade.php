@extends ('layouts.admin')
@section ('contenido')

<a href="../reporte"><button class="btn btn-success">Volver</button></a>

<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h2>Puntos canjeados y otorgados por tienda y lugar &nbsp; &nbsp; </h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover" align="center">

        <thead>
          <th><h3>Nombre tienda</h3></th>
          <th><h3>Canjeado</h3></th>
          <th><h3>Lugar</h3></th>
        </thead>

     @foreach ($canjeados as $c)
         <tr>
					 <td> <h4>  {{$c->nombre_tienda}}  </h4> </td>
           <td> <h4>  {{$c->canjeados}}  </h4> </td>
           <td> <h4>  {{$c->nombre_lugar}}  </h4> </td>
         </tr>
    @endforeach

        <br>

        <thead>
          <th><h3>Nombre Tienda</h3></th>
          <th><h3>Otorgado</h3></th>
          <th><h3>Lugar</h3></th>
        </thead>

     @foreach ($otorgados as $o)
         <tr>
           <td> <h4>  {{$o->nombre_tienda}}  </h4> </td>
           <td> <h4>  {{$o->otorgado}}  </h4> </td>
           <td> <h4>  {{$o->nombre_lugar}}  </h4> </td>
         </tr>
    @endforeach

		</div>
	</div>
</div>







@endsection
