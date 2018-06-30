@extends ('layouts.admin')
@section ('contenido')

<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Medios de pago de clientes</h3>
    <a href="medio/createNatural"><button class="btn btn-succes">Añadir Natural</button></a>
    <a href="medio/createJuridico"><button class="btn btn-succes">Añadir Juridico</button></a>
    @include ('cliente.medio.search')
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Código</th>
          <th>Tipo</th>
          <th>Número tarjeta</th>
					<th>Marca tarjeta</th>
					<th>Número de cheque</th>
          <th>Cliente Jurídico</th>
          <th>Cliente Natural</th>
          <th>Opciones</th>
				</thead>

                @foreach ($medio as $m)
				 <tr>
					<td>{{$m->codigo}}</td>
					<td>{{$m->tipo}}</td>
					<td>{{$m->num_tarjeta}}</td>
					<td>{{$m->marca_tarjeta}}</td>
					<td>{{$m->num_cheque}}</td>
					<td>{{$m->rif}}</td>
          <td>{{$m->cedula}}</td>
					<td>
						<a href="" data-target="#modal-delete-{{$m->codigo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>

           @include ('cliente.medio.modal')

        @endforeach

			</table>
		</div>


	</div>

	{{$medio->render()}}

</div>
@endsection
