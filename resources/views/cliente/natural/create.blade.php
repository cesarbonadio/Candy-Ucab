@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Cliente Natural</h3>

		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif


          {!! Form::open(array('url'=>'cliente/natural','method'=>'POST','autocomplete'=>'off','files'=>'true')) !!}
          {{Form::token()}}


             <div class="form-group">
             	<label for="cedula">Cedula</label>
             	<input type="text" name="cedula" class="form-control" value="{{old('cedula')}}" placeholder="Cedula...">

             </div>
              <div class="form-group">
             	<label for="rif">RIF</label>
             	<input type="text" name="rif" class="form-control" value="{{old('rif')}}" placeholder="Rif....">

             </div>
              <div class="form-group">
             	<label for="num_carnet">Nro.Carnet</label>
             	<input type="text" name="num_carnet" class="form-control" value="{{old('num_carnet')}}" placeholder="Nro.Carnet...">

             	</div>
              <div class="form-group">
             	<label for="correo">Correo</label>
             	<input type="text" name="correo" class="form-control" value="{{old('correo')}}" placeholder="Correo...">

             </div>
              <div class="form-group">
             	<label for="nombre">Nombre</label>
             	<input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Nombre...">

             </div>
              <div class="form-group">
             	<label for="apellido">Apellido</label>
             	<input type="text" name="apellido" class="form-control" value="{{old('apellido')}}" placeholder="Apellido...">

             </div>
              <div class="form-group">
              <label>Lugar</label>
              <select name="fk_lugar" class="form-control">
                @foreach ($lugar as $lug)
                <option value="{{$lug->codigo}}">{{$lug->nombre}} ({{$lug->tipo}})</option>
                @endforeach
              </select>

             </div>
              <div class="form-group">
              <label>Tienda</label>
              <select name="fk_tienda" class="form-control">
                @foreach ($tienda as $ti)
                <option value="{{$ti->codigo}}">{{$ti->nombre}} ({{$ti->tipo}})</option>
                @endforeach
              </select>

             </div>

             <div class="form-group">
               <button class="btn btn-primary" type="submit">Guardar</button>
               <button class="btn btn-info" type="reset">Limpiar</button>
               <button class="btn btn-danger" type="reset"><a href="../natural" style="color: inherit;">Cancelar</a></button>
             </div>
          {!!Form::close()!!}

	</div>

</div>
@stop
