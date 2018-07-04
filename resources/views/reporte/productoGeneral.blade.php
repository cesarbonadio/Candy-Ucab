@extends ('layouts.admin')
@section ('contenido')


<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h2>Metodo de pago más usado &nbsp; &nbsp; <a href="../reporte"><button class="btn btn-success">Volver</button></a></h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">

        <thead>
          <th><h3>Nombre del producto</h3></th>
          <th><h3>Veces comprado</h3></th>
        </thead>

         <tr>
           <td> <h4 style="text-transform: capitalize;">  {{$productoGeneral[0]->pronombre}}  </h4></td>
           <td> <h4>  {{$productoGeneral[0]->veces_comprado}}  </h4></td>
         </tr>
		</div>
	</div>
</div>
@endsection
