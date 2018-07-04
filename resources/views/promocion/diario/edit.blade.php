@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Diario: {{$diario->codigo}}</h3>

		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

          {!! Form::model($diario,['method'=>'PATCH','route'=>['diario.update',$diario->codigo]]) !!}
          {{Form::token()}}
            <div class="form-group">
            	<label for="descripcion">Descripcion</label>
             	<input type="text" name="descripcion" class="form-control" value="{{$diario->descripcion}}" placeholder="Descripcion...">

            </div>
            <div class="form-group">
             	<label for="fecha_emision">Fecha de Emision</label>
             	<input type="text" name="fecha_emision" class="form-control" value="{{$diario->fecha_emision}}" placeholder="Fecha Emision....">
            </div>
            <div class="form-group">
             	<label for="fecha_vencimiento">Fecha de Vencimiento</label>
             	<input type="text" name="fecha_vencimiento" class="form-control" value="{{$diario->fecha_vencimiento}}" placeholder="Fecha Vencimiento....">
            </div>

            <div class="form-group">
               <br>
             	<button class="btn btn-primary" type="submit">Guardar</button>
             	<button class="btn btn-danger" type="reset"><a href="../../diario" style="color: inherit;">Cancelar</a></button>
            </div>
          {!!Form::close()!!}

	</div>

</div>
@endsection
