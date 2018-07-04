@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Diario</h3>

		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

          {!! Form::open(array('url'=>'promocion/diario','method'=>'POST','autocomplete'=>'off')) !!}
          {{Form::token()}}
          
              <div class="form-group">
             	<label for="descripcion">Descripcion</label>
             	<input type="text" name="descripcion" class="form-control" placeholder="Descripcion...">

             </div>

             <div class="form-group">
              <label for="descripcion">Fecha de Emision</label>
              <input type="text" name="fecha_emision" class="form-control" placeholder="Fecha de Emision...">

             </div>
             <div class="form-group">
              <label for="descripcion">Fecha de Vencimiento</label>
              <input type="text" name="fecha_vencimiento" class="form-control" placeholder="Fecha de Vencimiento...">

             </div>


             <div class="form-group">
               <br>
             	<button class="btn btn-primary" type="submit">Guardar</button>
             	<button class="btn btn-danger" type="reset"><a href="../descuento" style="color: inherit;">Cancelar</a></button>
             </div>
          {!!Form::close()!!}

	</div>

</div>
@endsection
