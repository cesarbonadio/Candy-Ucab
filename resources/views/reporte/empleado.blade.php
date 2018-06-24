@extends ('layouts.admin')
@section ('contenido')


<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h2>Empleados &nbsp; &nbsp; <a href="../reporte"><button class="btn btn-success">Volver</button></a></h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">

        <thead>
          <th><h3>Cédula</h3></th>
          <th><h3>Nombre</h3></th>
          <th><h3>Horas trabajadas</h3></th>
          <th><h3>Promedio entrada</h3></th>
          <th><h3>Promedio salida</h3></th>
          <th><h3>Días con retardo</h3></th>
          <th><h3>Días de ausencia</h3></th>
        </thead>


       @for ($i=0; $i<=sizeof($empleado)-1; $i++)
         <tr>
           <td> <h4>  {{$empleado[$i]->cedula}}  </h4> </td>
           <td> <h4>  {{$empleado[$i]->nombre}}  </h4> </td>
           <td> <h4>  {{$empleado[$i]->horas}}  </h4> </td>
           <td> <h4>  {{$empleado[$i]->promedio}}  </h4> </td>
           <td> <h4>  {{$empleado[$i]->promedioS}}  </h4> </td>
           

         </tr>
       @endfor

		</div>
	</div>
</div>
@endsection
