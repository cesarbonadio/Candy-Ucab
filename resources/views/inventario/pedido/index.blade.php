@extends ('layouts.admin')
@section ('contenido')

<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<pre style="border:none;"><h3>Listado de reposiciones a la fabrica<a href="contacto/create"><button class="btn btn-succes">Nuevo</button></a></h3></pre>
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
          <th>Fecha</th>
          <th>Codigo presupuesto</th>
					<th>Total</th>
          <th>Estatus</th>
				</thead>

                @foreach ($pedido as $p)
				<tr>
					<td>{{$p->codigo}}</td>
					<td>{{$p->fecha}}</td>
					<td>{{$p->c_presupuesto}}</td>
					<td>{{$p->total}}</td>
					<td>{{$p->descripcion}}</td>

					<td>
						<a href="{{URL::action('ReposicionController@edit',$p->codigo)}}"><button class="btn btn-info">Cambiar Estatus</button></a>
					</td>
				</tr>


        @endforeach

			</table>
		</div>


	</div>

</div>
@endsection
