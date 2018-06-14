@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Cliente Juridico</h3>

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


          {!! Form::open(array('url'=>'cliente/juridico','method'=>'POST','autocomplete'=>'off','files'=>'true')) !!}
          {{Form::token()}}

          <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
             	<label for="rif">RIF</label>
             	<input type="text" name="rif" class="form-control" placeholder="RIF..." value="{{old('rif')}}">
             </div>
           </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	<label for="num_carnet">Nro.Carnet</label>
             	<input type="text" name="num_carnet" class="form-control" placeholder="Nro.Carnet...." value="{{old('num_carnet')}}">
             </div>
             </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	<label for="correo">Correo</label>
             	<input type="text" name="correo" class="form-control" placeholder="Correo..." value="{{old('correo')}}">
             </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	<label for="d_social">D.Social</label>
             	<input type="text" name="d_social" class="form-control" placeholder="D.Social..." value="{{old('d_social')}}">
             </div>
           </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	<label for="r_social">R.Social</label>
             	<input type="text" name="r_social" class="form-control" placeholder="R.Social..." value="{{old('r_social')}}">
             </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	<label for="pagina_web">Pagina Web</label>
             	<input type="text" name="pagina_web" class="form-control" placeholder="Pagina Web..." value="{{old('pagina_web')}}">
            </div>
            </div>



            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
              <label for="capital">Capital</label>
              <input type="text" name="capital" class="form-control" placeholder="Capital..." value="{{old('capital')}}">
             	 </div>
           </div>



            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	<label>Lugar</label>
             	<select name="fk_lugar" class="form-control">
                @foreach ($lugar as $lug)
                <option value="{{$lug->codigo}}">{{$lug->nombre}} ({{($lug->tipo)}})</option>
                @endforeach
              </select>
             </div>
             </div>


            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
              <label >Lugar Fiscal</label>
              <select name="fk_lugar_fiscal" class="form-control">
                @foreach ($lugar as $lug)
                <option value="{{$lug->codigo}}"> {{$lug->nombre}} ({{($lug->tipo)}})</option>
                @endforeach
              </select>
             </div>
             </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	<label>Tienda</label>
             	<select name="fk_tienda" class="form-control">
                @foreach ($tienda as $ti)
                <option value="{{$ti->codigo}}">{{$ti->nombre}} ({{($ti->tipo)}})</option>
                @endforeach
              </select>
             </div>
             </div>

             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
             	<button class="btn btn-primary" type="submit">Guardar</button>
             	<button class="btn btn-danger" type="reset"><a href="../juridico" style="color: inherit;">Cancelar</a></button>
             	</div>
             </div>
           </div>
          {!!Form::close()!!}

@endsection
