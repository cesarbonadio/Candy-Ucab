@extends ('layouts.admin')
@section ('contenido')


<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h2>Metodo más usado en los pagos &nbsp; &nbsp; <a href="../reporte"><button class="btn btn-success">Volver</button></a></h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">

        <thead>
          <th><h3>Metodo de pago</h3></th>
          <th><h3>Veces usado en los pagos</h3></th>
        </thead>

         <tr>
           <td> <h4 style="text-transform: capitalize;">  {{$metodo[0]->tipo}}  </h4></td>
           <td> <h4>  {{$metodo[0]->veces_usado}}  </h4></td>
         </tr>
		</div>
	</div>
</div>
@endsection
