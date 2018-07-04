@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Privilegio: {{$privilegio->descripcion}}
		</h3>



		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

  </div>
</div>

          {!! Form::model($privilegio,['method'=>'PATCH','route'=>['privilegio.update',$privilegio->codigo],'files'=>'true']) !!}
          {{Form::token()}}

            <div class="row">
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                  <label for="descripcion">Descripcion</label>
                  <input type="text" name="descripcion" class="form-control" value="{{$privilegio->descripcion}}">
                </div>
              </div>

	
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
						      <br>
						      <button class="btn btn-primary" type="submit">Guardar</button>
 			            <button class="btn btn-danger" type="reset"><a href="../../privilegio" style="color: inherit;">Cancelar</a></button>
                </div>
              </div>
            </div>

          {!!Form::close()!!}

@stop
