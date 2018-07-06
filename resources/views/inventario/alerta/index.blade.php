@extends ('layouts.admin')
@section ('contenido')

<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h4>Listado de Altertas de inventario (productos que tienen menos de 100 unidades en una tienda)</h4>
    <br>
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
          <th>Nombre tienda</th>
          <th>Nombre producto</th>
					<th>Cantidad</th>
					<th>Zona</th>
				</thead>

      @foreach ($alerta as $a)

				<tr>
					<td>{{$a->codigo}}</td>
					<td>{{$a->nombretienda}}</td>
					<td>{{$a->nombreproducto}}</td>
					<td>{{$a->cantidad}}</td>
					<td>{{$a->zona}}</td>
				</tr>

        @endforeach

			</table>
		</div>
	</div>
</div>
@endsection
