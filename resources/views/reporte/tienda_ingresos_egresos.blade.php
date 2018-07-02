@extends ('layouts.admin')
@section ('contenido')


<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h2>Ingresos vs Egresos por tienda &nbsp; &nbsp; <a href="../reporte"><button class="btn btn-success">Volver</button></a></h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover" align="center">

        <thead>
          <th><h3>Código</h3></th>
          <th><h3>Nombre</h3></th>
          <th><h3>Ingresos</h3></th>
          <th><h3>Egresos</h3></th>
        </thead>


     @for ($i=0; $i<=sizeof($ingreso)-1; $i++)
         <tr>
           <td> <h4>  {{$ingreso[$i]->codigo}}  </h4> </td>
           <td> <h4>  {{$ingreso[$i]->nombre}}  </h4> </td>
           <td> <h4>  {{$ingreso[$i]->total}}  </h4> </td>
            <td> <h4>  {{$egreso[$i]->total}}  </h4> </td>

         </tr>
     @endfor

		</div>
	</div>
</div>
@endsection
