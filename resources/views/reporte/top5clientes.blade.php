@extends ('layouts.admin')
@section ('contenido')


<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h2>Top 5 clientes &nbsp; &nbsp; <a href="../reporte"><button class="btn btn-success">Volver</button></a></h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">

        <thead>

       	  <th><h3>Cantidad comprado</h3></th>
          <th><h3>Cedula/Rif</h3></th>
          <th><h3>Veces comprado</h3></th>
        </thead>
         	@foreach($top5Clientes as $t5)

         <tr>
            <td> <h4 style="text-transform: capitalize;">  {{$t5->suma}}  </h4></td>
            <td> <h4 style="text-transform: capitalize;">  {{$t5->idcliente}}  </h4></td>
            <td> <h4 style="text-transform: capitalize;">  {{$t5->nombre}}  {{$t5->apellido}}</h4></td>


         </tr>
         @endforeach


		</div>
	</div>
</div>
@endsection
