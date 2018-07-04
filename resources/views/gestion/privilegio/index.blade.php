@extends ('layouts.admin')
@section ('contenido')
<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<pre style="border:none;"><h3>Listado de Privilegios  <a href="privilegio/create"><button class="btn btn-succes">Nuevo</button></a></h3></pre>
		@include('gestion.privilegio.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
					<th>Descripcion</th>
				</thead>
                @foreach ($privilegio as $pri)
				<tr>
					<td>{{ $pri->codigo}}</td>
					<td>{{ $pri->descripcion}}</td>
					<td>
						<a href="{{URL::action('PrivilegioController@edit',$pri->codigo)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$pri->codigo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>

				@include('gestion.privilegio.modal')
        @endforeach

			</table>
		</div>

{{$privilegio->render()}}

	</div>

</div>
@endsection
