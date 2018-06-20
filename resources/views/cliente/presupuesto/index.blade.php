@extends ('layouts.admin')
@section ('contenido')

<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Verder a cliente en tienda (Generar presupuesto)</h3>
    <a href="presupuesto/createNatural"><button class="btn btn-succes">Añadir Natural</button></a>
    <a href="presupuesto/createJuridico"><button class="btn btn-succes">Añadir Juridico</button></a>
    <br>
    @include ('cliente.presupuesto.search')
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Código</th>
          <th>Total acumulado</th>
          <th>Fecha</th>
					<th>Rif (juridico)</th>
          <th>Cedula (natural)</th>
          <th>Usuario</th>
          <th>Opciones</th>
				</thead>

            @foreach ($presupuesto as $p)
				  <tr>
					<td>{{$p->codigo}}</td>
					<td>{{$p->total}}</td>
					<td>{{$p->fecha}}</td>
					<td>{{$p->rif}}</td>
					<td>{{$p->cedula}}</td>
          <td>{{$p->usuario}}</td>
					 <td>
						<a href="{{URL::action('PresupuestoController@edit',$p->codigo)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$p->codigo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					 </td>
				  </tr>

           @include ('cliente.presupuesto.modal')
        @endforeach
			</table>
		</div>
	</div>
</div>
@endsection
