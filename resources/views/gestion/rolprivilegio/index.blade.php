@extends ('layouts.admin')
@section ('contenido')
<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<pre style="border:none;"><h3>Listado de privilegios del rol <a href="rolprivilegio/create"><button class="btn btn-succes">Nuevo</button></a></h3></pre>
		@include('gestion.rolprivilegio.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
					<th>Rol</th>
					<th>Descripcion de privilegio</th>
				</thead>
                @foreach ($rolprivilegio as $rp)
				<tr>
					<td>{{ $rp->codigo}}</td>
					<td>{{ $rp->rdes}}</td>

					<td>{{ $rp->pdes}}</td>
					<td>
						<a href="{{URL::action('RolPrivilegioController@edit',$rp->codigo)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$rp->codigo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>

				@include('gestion.rolprivilegio.modal')
        @endforeach

			</table>
		</div>

{{$rolprivilegio->appends(Request::except('page'))->render()}}

	</div>

</div>
@endsection
