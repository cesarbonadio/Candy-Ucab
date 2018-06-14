@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Cliente Natural: {{$naturale->nombre}}</h3>

		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

          {!! Form::model($naturale,['method'=>'PATCH','route'=>['natural.update',$naturale->cedula]]) !!}
          {{Form::token()}}

             <div class="form-group">
             	<label for="cedula">Cedula</label>
             	<input type="text" name="cedula" class="form-control" value="{{$naturale->cedula}}" placeholder="Cedula...">

             </div>
              <div class="form-group">
             	<label for="rif">RIF</label>
             	<input type="text" name="rif" class="form-control" value="{{$naturale->rif}}" placeholder="Rif....">

             </div>
              <div class="form-group">
             	<label for="num_carnet">Nro.Carnet</label>
             	<input type="text" name="num_carnet" class="form-control" value="{{$naturale->num_carnet}}" placeholder="Nro.Carnet...">

             	</div>
              <div class="form-group">
             	<label for="correo">Correo</label>
             	<input type="text" name="correo" class="form-control" value="{{$naturale->correo}}" placeholder="Correo...">

             </div>
              <div class="form-group">
             	<label for="nombre">Nombre</label>
             	<input type="text" name="nombre" class="form-control" value="{{$naturale->nombre}}" placeholder="Nombre...">

             </div>
              <div class="form-group">
             	<label for="apellido">Apellido</label>
             	<input type="text" name="apellido" class="form-control" value="{{$naturale->apellido}}" placeholder="Apellido...">

             </div>
              <div class="form-group">
              <label>Lugar</label>
              <select name="fk_lugar" class="form-control">
                @foreach ($lugar as $lug)
                @if ($lug->codigo==$naturale->fk_lugar)
                <option value="{{$lug->codigo}}" selected>{{$lug->nombre}} ({{$lug->tipo}})</option>
                @else
                <option value="{{$lug->codigo}}">{{$lug->nombre}} ({{$lug->tipo}})</option>
                @endif
                @endforeach
              </select>

             </div>
              <div class="form-group">
              <label>Tienda</label>
              <select name="fk_tienda" class="form-control">
                @foreach ($tienda as $ti)
                @if ($ti->codigo==$naturale->fk_tienda)
                <option value="{{$ti->codigo}}" selected>{{$ti->nombre}} ({{$ti->tipo}})</option>
                @else
                <option value="{{$ti->codigo}}">{{$ti->nombre}} ({{$ti->tipo}})</option>
                @endif
                @endforeach
              </select>
             </div>

             <div class="form-group">
             	<button class="btn btn-primary" type="submit">Guardar</button>
             	<button class="btn btn-danger" type="reset"><a href="../../natural" style="color: inherit;">Cancelar</a></button>
             </div>
          {!!Form::close()!!}

	</div>

</div>
@endsection
