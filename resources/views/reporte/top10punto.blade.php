@extends ('layouts.admin')
@section ('contenido')

<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h2>Top 10 clientes por puntos &nbsp; &nbsp; <a href="../reporte"><button class="btn btn-success">Volver</button></a></h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">

        <thead>
          <th><h3>Rif o Cédula</h3></th>
          <th><h3>Nombre</h3></th>
          <th><h3>Puntos</h3></th>
        </thead>

       <?php $j = 0; ?>
       @for ($i=0; $i<=sizeof($cliente)-1; $i++)
         @if ($j == 10) <?php break; ?> @endif
         <tr>
           <td> <h4>  {{$cliente[$i]->id}}  </h4> </td>
           <td> <h4>  {{$cliente[$i]->nombre}}</h4> </td>
           <td> <h4>  {{$cliente[$i]->suma}}</h4> </td>
         </tr>
         <?php $j++; ?>
       @endfor

		 </table>
		</div>
	</div>
</div>
@endsection
