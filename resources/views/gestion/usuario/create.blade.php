@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Asignar privilegio</h3>

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
          {!! Form::open(array('url'=>'gestion/usuario','method'=>'POST','autocomplete'=>'off','files'=>'true')) !!}
          {{Form::token()}}

          <div class="row">

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	  <label for="username">Username</label>
             	  <input type="text" name="username" class="form-control" placeholder="Nombre de usuario...">
              </div>
            </div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	  <label for="password">Password</label>
             	  <input type="text" name="password" class="form-control" placeholder="Contraseña...">
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	  <label for="puntos">Puntos</label>
             	  <input type="text" name="puntos" class="form-control" placeholder="Puntos...">
              </div>
            </div>
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                  <label >Rol</label>
                  <select name="fk_rol" class="form-control">
                    @foreach ($rol as $rl)
                      <option value="{{$rl->codigo}}"> {{$rl->descripcion}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	  <label for="fk_juridico">Fk Juridico</label>
             	  <input type="text" name="fk_juridico" class="form-control" placeholder="Fk Juridico...">
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	  <label for="fk_naturale">Fk Naturale</label>
             	  <input type="text" name="fk_naturale" class="form-control" placeholder="Fk Naturale...">
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	  <label for="fk_empleado">Fk Empleado</label>
             	  <input type="text" name="fk_empleado" class="form-control" placeholder="Fk Empleado...">
              </div>
            </div>


             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
							 <br>
             	<button class="btn btn-primary" type="submit">Guardar</button>
             	<button class="btn btn-danger" type="reset"><a href="../usuario" style="color: inherit;">Cancelar</a></button>
             	</div>
             </div>
           </div>
          {!!Form::close()!!}

@endsection
