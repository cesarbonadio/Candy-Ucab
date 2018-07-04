@extends ('layouts.admin')
@section ('contenido')
<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Diario<a href="diario/create"><button class="btn btn-succes">Nuevo</button></a></h3>
		@include('promocion.diario.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
					<th>Descripcion</th>
					<th>Fecha de Emision</th>
					<th>Fecha de vencimiento</th>
				</thead>
                @foreach ($diario as $dia)
				<tr>
					<td>{{ $dia->codigo}}</td>
					<td>{{ $dia->descripcion}}</td>
					<td>{{ $dia->fecha_emision}}</td>
					<td>{{ $dia->fecha_emision}}</td>

					<td>
						<a href="{{URL::action('DiarioController@edit',$dia->codigo)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$dia->codigo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('promocion.diario.modal')
      @endforeach
			</table>
		</div>

		{{$diario->render()}}

	</div>

</div>
@endsection
