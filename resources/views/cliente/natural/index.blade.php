@extends ('layouts.admin')
@section ('contenido')
<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<pre style="border:none;"><h3>Listado de Clientes Naturales   <a href="natural/create"><button class="btn btn-succes">Nuevo</button></a></h3></pre>
		@include('cliente.natural.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Cedula</th>
					<th>RIF</th>
					<th>Correo</th>
					<th>Nro.Carnet</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Lugar</th>
					<th>Tienda</th>
					<th>Opciones</th>
				</thead>
                @foreach ($naturale as $nat)
				<tr>
					<td>{{ $nat->cedula}}</td>
					<td>{{ $nat->rif}}</td>
					<td>{{ $nat->correo}}</td>
					<td>{{ $nat->num_carnet}}</td>
					<td>{{ $nat->nombre}}</td>
					<td>{{ $nat->apellido}}</td>
					<td>{{ $nat->lugar}}</td>
					<td>{{ $nat->tienda}}</td>
					<td>
						<a href="{{URL::action('NaturalController@edit',$nat->cedula)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$nat->cedula}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>

        @include('cliente.natural.modal')

      @endforeach
		</table>
	</div>

		{{$naturale->render()}}
	</div>

</div>
@endsection
