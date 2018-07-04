@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Diario Descuento</h3>

		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

          {!! Form::open(array('url'=>'promocion/diario_descuento','method'=>'POST','autocomplete'=>'off')) !!}
          {{Form::token()}}
          
              <div class="form-group">
             	<label for="c_diario">Codigo del diario</label>
             	<input type="text" name="c_diario" class="form-control" placeholder="Diario...">

             </div>

             <div class="form-group">
              <label for="c_descuento">Codigo del descuento</label>
              <input type="text" name="c_descuento" class="form-control" placeholder="Descuento...">

             </div>
             <div class="form-group">
               <br>
             	<button class="btn btn-primary" type="submit">Guardar</button>
             	<button class="btn btn-danger" type="reset"><a href="../diario_descuento" style="color: inherit;">Cancelar</a></button>
             </div>
          {!!Form::close()!!}

	</div>

</div>
@endsection
