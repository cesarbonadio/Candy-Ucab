@extends ('layouts.admin')
@section ('contenido')

<style>
#centrar {
   text-align: center;
}
</style>


<div class ="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    @foreach ($puntos as $p)
      @if ($p->fecha_fin==null)
      <h3>Valor actual del punto : {{$p->valor}} Bsf &nbsp;
        <a href="punto/create"><button class="btn btn-succes">Actualizar valor</button>
        </a>
      </h3>
      @endif
		@endforeach
    <br>
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-stripped table-bordered table-condensed table-hover">
				<thead>
					<th id="centrar">Código del histórico</th>
					<th>Fecha inicial</th>
					<th>Fecha final</th>
          <th>Valor</th>
				</thead>


        @foreach ($puntos as $p)
				  <tr>
					<td id="centrar">{{ $p->codigo}}</td>
					<td>{{ $p->fecha_inicio}}</td>
          @if ($p->fecha_fin!=null)
					<td>{{ $p->fecha_fin}}</td>
					<td>{{ $p->valor}}</td>
          <td>
						<a href="" data-target="#modal-delete-{{$p->codigo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
          @else
          <td>Por definir</td>
          <td>{{ $p->valor}}</td>
				   @endif
         @include('administrar.punto.modal')
        @endforeach
			</table>
		</div>


	</div>

</div>
@stop
