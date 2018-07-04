@extends ('layouts.admin')
@section ('contenido')
<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<pre style="border:none;"><h3>Listado de Roles  <a href="rol/create"><button class="btn btn-succes">Nuevo</button></a></h3></pre>
		@include('gestion.rol.search')
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
                @foreach ($rol as $rl)
				<tr>
					<td>{{ $rl->codigo}}</td>
					<td>{{ $rl->descripcion}}</td>
					<td>
						<a href="{{URL::action('RolController@edit',$rl->codigo)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$rl->codigo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>

				@include('gestion.rol.modal')
        @endforeach

			</table>
		</div>

{{$rol->render()}}

	</div>

</div>
@endsection
