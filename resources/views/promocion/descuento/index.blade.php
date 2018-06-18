@extends ('layouts.admin')
@section ('contenido')
<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Descuentos<a href="descuento/create"><button class="btn btn-succes">Nuevo</button></a></h3>
		@include('promocion.descuento.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
					<th>Porcentaje</th>
					<th>Descripcion</th>
					<th>Producto</th>
					<th>Opciones</th>
				</thead>
                @foreach ($descuento as $des)
				<tr>
					<td>{{ $des->codigo}}</td>
					<td>{{ $des->porcentaje}}</td>
					<td>{{ $des->descripcion}}</td>
					<td>{{ $des->producto}}</td>
					<td>
						<a href="{{URL::action('DescuentoController@edit',$des->codigo)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$des->codigo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('promocion.descuento.modal')
      @endforeach
			</table>
		</div>

		{{$descuento->render()}}

	</div>

</div>
@endsection
