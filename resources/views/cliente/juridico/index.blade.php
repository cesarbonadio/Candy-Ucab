@extends ('layouts.admin')
@section ('contenido')
<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<pre style="border:none;"><h3>Listado de Clientes Juridicos  <a href="juridico/create"><button class="btn btn-succes">Nuevo</button></a></h3></pre>
		@include('cliente.juridico.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>RIF</th>
					<th>Nro.Carnet</th>
					<th>Correo</th>
					<th>D.Social</th>
					<th>R.Social</th>
					<th>Pagina Web</th>
					<th>Capital</th>
					<th>Lugar</th>
					<th>Lugar Fiscal</th>
					<th>Tienda</th>
					<th>Opciones</th>
				</thead>
                @foreach ($juridico as $jur)
				<tr>
					<td>{{ $jur->rif}}</td>
					<td>{{ $jur->num_carnet}}</td>
					<td>{{ $jur->correo}}</td>
					<td>{{ $jur->d_social}}</td>
					<td>{{ $jur->r_social}}</td>
					<td>{{ $jur->pagina_web}}</td>
					<td>{{ $jur->capital}}</td>
					<td>{{ $jur->lugar}}</td>
					<td>{{ $jur->lugarf}}</td>
					<td>{{ $jur->tienda}}</td>
					<td>
						<a href="{{URL::action('JuridicoController@edit',$jur->rif)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$jur->rif}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>

				@include('cliente.juridico.modal')
        @endforeach

			</table>
		</div>

{{$juridico->render()}}

	</div>

</div>
@endsection
