@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Descuento</h3>

		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

          {!! Form::open(array('url'=>'promocion/descuento','method'=>'POST','autocomplete'=>'off')) !!}
          {{Form::token()}}
             <div class="form-group">
             	<label for="porcentaje">Porcentaje</label>
             	<input type="text" name="porcentaje" class="form-control" placeholder="Porcentaje...">

             </div>
              <div class="form-group">
             	<label for="descripcion">Descripcion</label>
             	<input type="text" name="descripcion" class="form-control" placeholder="Descripcion....">

             </div>

              <div class="form-group">
              <label>Producto</label>
              <select name="fk_producto" class="form-control">
                @foreach ($producto as $pro)
                <option value="{{$pro->codigo}}">{{$pro->nombre}}</option>
                @endforeach
              </select>

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
