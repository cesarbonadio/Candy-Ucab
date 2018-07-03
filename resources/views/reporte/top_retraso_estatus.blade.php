@extends ('layouts.admin')
@section ('contenido')


<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h2>Estatus que genera mas retraso en los pedidos&nbsp; &nbsp; <a href="../reporte"><button class="btn btn-success">Volver</button></a></h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover" align="center">

        <thead>
          <th><h3>Codigo</h3></th>
          <th><h3>Descripcion</h3></th>
          <th><h3>Pedidos en estatus</h3></th>
        </thead>

         <tr>
					 <td> <h4> {{$estatus[0]->c_estatus}}  </h4> </td>
           <td> <h4> {{$estatus[0]->descripcion}} </h4> </td>
           <td> <h4> {{$estatus[0]->total}} </h4> </td>
         </tr>

		</div>
	</div>
</div>
@endsection
