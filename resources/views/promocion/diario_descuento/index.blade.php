@extends ('layouts.admin')
@section ('contenido')
<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Diario<a href="diario_descuento/create"><button class="btn btn-succes">Nuevo</button></a></h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
					<th>Codigo del Diario</th>
					<th>Descripcion del diario</th>
					<th>Codigo del Descuento</th>
					<th>Descripcion del descuento</th>
				</thead>
                @foreach ($diario_descuento as $dd)
				<tr>
					<td>{{ $dd->codigo}}</td>
					<td>{{ $dd->c_diario}}</td>
					<td>{{$dd->ddes}}</td>
					<td>{{ $dd->c_descuento}}</td>
					<td>{{$dd->dedes}}</td>

					<td>
						<a href="{{URL::action('Diario_DescuentoController@edit',$dd->codigo)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$dd->codigo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('promocion.diario_descuento.modal')
      @endforeach
			</table>
		</div>

		{{$diario_descuento->render()}}

	</div>

</div>
@endsection
