@extends ('layouts.admin')
@section ('contenido')
<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<pre style="border:none;"><h3>Listado de privilegios del rol <a href="usuario/create"><button class="btn btn-succes">Nuevo</button></a></h3></pre>
		@include('gestion.usuario.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Username</th>
					<th>Password</th>
					<th>Puntos</th>
					<th>Rol</th>
					<th>fk_juridico</th>
					<th>fk_naturale</th>
					<th>fk_empleado</th>
				</thead>
                @foreach ($usuario as $usu)
				<tr>
					<td>{{ $usu->id}}</td>
					<td>{{ $usu->username}}</td>
					<td>{{ $usu->password}}</td>
					<td>{{ $usu->puntos}}</td>
					<td>{{ $usu->rolnom}}</td>
					<td>{{ $usu->fk_juridico}}</td>
					<td>{{ $usu->fk_naturale}}</td>
					<td>{{ $usu->fk_empleado}}</td>
					<td>
						<a href="{{URL::action('UsuarioController@edit',$usu->id)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>

				@include('gestion.usuario.modal')
        @endforeach

			</table>
		</div>

{{$usuario->appends(Request::except('page'))->render()}}

	</div>

</div>
@endsection
