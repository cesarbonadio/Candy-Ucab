@extends ('layouts.admin')
@section ('contenido')

<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<pre style="border:none;"><h3>Listado de Contactos de clientes jurídicos  <a href="contacto/create"><button class="btn btn-succes">Nuevo</button></a></h3></pre>
    @include ('cliente.contacto.search')
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Cedula</th>
          <th>Nombre</th>
          <th>Apellido</th>
					<th>Función</th>
          <th>Cliente Jurídico</th>
          <th>Rif Cliente Jurídico</th>
          <th>Opciones</th>
				</thead>

                @foreach ($contacto as $c)
				<tr>
					<td>{{$c->cedula}}</td>
					<td>{{$c->nombre}}</td>
					<td>{{$c->apellido}}</td>
					<td>{{$c->funcion}}</td>
					<td>{{$c->dsocial}}</td>
          <td>{{$c->rif}}</td>
					<td>
						<a href="{{URL::action('ContactoController@edit',$c->cedula)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$c->cedula}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>

				@include('cliente.contacto.modal')
        @endforeach

			</table>
		</div>


	</div>

</div>
@endsection
