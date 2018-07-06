@extends ('layouts.admin')
@section ('contenido')
<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<pre style="border:none;"><h3>Listado de Clientes Frecuentes Por Tienda En Un Periodo de Tiempo</h3><a href="../reporte"><button class="btn btn-success">Volver</button></a></pre>
		@include('reporte.search_clientes_frecuentes')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Rif o Cédula</th>
					<th>Nombre o Denominacion social</th>
					<th>Tienda</th>
					<th>Compras</th>
					
				</thead>
                @foreach ($cliente as $clie)
				<tr>
					<td>{{ $clie->id}}</td>
					<td>{{ $clie->nombre}}</td>
					<td>{{ $clie->tienda}}</td>
					<td>{{ $clie->compra}}</td>
					
				</tr>

        

      @endforeach
		</table>
	</div>
     
	</div>

</div>
@endsection
