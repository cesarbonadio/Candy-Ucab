@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Actualizar punto</h3>

<!--si necesito esto porque no puede ingresar un valor que no sea entero
    ni tampoco el mismo valor que el actual (unique pero no es unico en la
		base de datos pero si en el valor actual) utilizar custom messages-->
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif


          {!! Form::open(array('url'=>'administrar/punto','method'=>'POST','autocomplete'=>'off')) !!}
          {{Form::token()}}

             <div class="form-group">
             	<label for="valor">Ingrese nuevo valor</label>
             	<input type="text" name="valor" class="form-control" value="{{old('valor')}}" placeholder="valor...">

             </div>
             <div class="form-group">
               <button class="btn btn-primary" type="submit">Guardar</button>
               <button class="btn btn-danger" type="reset"><a href="../punto" style="color: inherit;">Cancelar</a></button>
             </div>

          {!!Form::close()!!}

	</div>
</div>
@stop
