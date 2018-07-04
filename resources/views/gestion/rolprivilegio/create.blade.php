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
          {!! Form::open(array('url'=>'gestion/rolprivilegio','method'=>'POST','autocomplete'=>'off','files'=>'true')) !!}
          {{Form::token()}}

          <div class="row">

              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                  <label >Rol</label>
                  <select name="c_rol" class="form-control">
                    @foreach ($rol as $rl)
                      <option value="{{$rl->codigo}}"> {{$rl->descripcion}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
              <label >Privilegio</label>
              <select name="c_priv" class="form-control">
                @foreach ($privilegio as $priv)
                <option value="{{$priv->codigo}}"> {{$priv->descripcion}}</option>
                @endforeach
              </select>
             </div>
             </div>

             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
							 <br>
             	<button class="btn btn-primary" type="submit">Guardar</button>
             	<button class="btn btn-danger" type="reset"><a href="../rolprivilegio" style="color: inherit;">Cancelar</a></button>
             	</div>
             </div>
           </div>
          {!!Form::close()!!}

@endsection
