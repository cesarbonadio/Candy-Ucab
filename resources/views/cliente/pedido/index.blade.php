@extends ('layouts.admin')
@section ('contenido')

<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de pedidos</h3>
	</div>
</div>
<br>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">

				<thead>
					<th>Codigo</th>
					<th>Fecha</th>
					<th>Presupuesto</th>
          <th>Total en presupuesto (por pagar)</th>
          <th>Opciones</th>
				</thead>


      @foreach ($pedido as $p)
				<tr>
					<td>{{ $p->codigo}}</td>
					<td>{{ $p->fecha}}</td>
					<td>{{ $p->c_presupuesto}}</td>
          <td>{{ $p->total}}</td>
					<td>
						<a href="{{URL::action('PedidoController@edit',$p->codigo)}}"><button class="btn btn-info">Pagar</button></a>
					</td>
				</tr>
      @endforeach


		</table>
	</div>
	</div>

</div>
@endsection
