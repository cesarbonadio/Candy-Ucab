@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Diario Descuento: {{$diario_descuento->codigo}}</h3>

		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

          {!! Form::model($diario_descuento,['method'=>'PATCH','route'=>['diario_descuento.update',$diario_descuento->codigo]]) !!}
          {{Form::token()}}
            <div class="form-group">
            	<label for="c_diario">Diario</label>
             	<input type="text" name="c_diario" class="form-control" value="{{$diario_descuento->c_diario}}" placeholder="Descripcion...">

            </div>
            <div class="form-group">
             	<label for="c_descuento">Descuento</label>
             	<input type="text" name="c_descuento" class="form-control" value="{{$diario_descuento->c_descuento}}" placeholder="Fecha Emision....">
            </div>


            <div class="form-group">
               <br>
             	<button class="btn btn-primary" type="submit">Guardar</button>
             	<button class="btn btn-danger" type="reset"><a href="../../diario_descuento" style="color: inherit;">Cancelar</a></button>
            </div>
          {!!Form::close()!!}

	</div>

</div>
@endsection
