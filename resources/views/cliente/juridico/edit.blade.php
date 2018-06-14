@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Cliente Juridico: {{$juridico->d_social}}
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

          {!! Form::model($juridico,['method'=>'PATCH','route'=>['juridico.update',$juridico->rif],'files'=>'true']) !!}
          {{Form::token()}}

           <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
              <label for="rif">RIF</label>
              <input type="text" name="rif" class="form-control" value="{{$juridico->rif}}">
             </div>
           </div>



            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
              <label for="num_carnet">Nro.Carnet</label>
              <input type="text" name="num_carnet" class="form-control" value="{{$juridico->num_carnet}}">

             </div>
             </div>



            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
              <label for="correo">Correo</label>
              <input type="text" name="correo" class="form-control" value="{{$juridico->correo}}">

              </div>
               </div>



            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
              <label for="d_social">D.Social</label>
              <input type="text" name="d_social" class="form-control" value="{{$juridico->d_social}}">

             </div>
              </div>


            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

              <div class="form-group">
              <label for="r_social">R.Social</label>
              <input type="text" name="r_social" class="form-control" value="{{$juridico->r_social}}">

             </div>
              </div>



            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
              <label for="pagina_web">Pagina Web</label>
              <input type="text" name="pagina_web" class="form-control" value="{{$juridico->pagina_web}}">
              </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
              <label for="capital">Capital</label>
              <input type="text" name="capital" class="form-control" value="{{$juridico->capital}}">
               </div>
           </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
              <label>Lugar</label>
              <select name="fk_lugar" class="form-control">
                @foreach ($lugar as $lug)
                @if ($lug->codigo==$juridico->fk_lugar)
                <option value="{{$lug->codigo}}" selected>{{$lug->nombre}}</option>
                @else
                <option value="{{$lug->codigo}}">{{$lug->nombre}}</option>
                @endif
                @endforeach
              </select>

             </div>
             </div>


            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
              <label >Lugar Fiscal</label>
              <select name="fk_lugar_fiscal" class="form-control">
                @foreach ($lugar as $lug)
                @if ($lug->codigo==$juridico->fk_lugar_fiscal)
                <option value="{{$lug->codigo}}" selected> {{ $lug->nombre }} ({{$lug->tipo}}) </option>
                 @else
                <option value="{{$lug->codigo}}">{{$lug->nombre}} ({{$lug->tipo}})</option>
                @endif
                @endforeach
              </select>
             </div>
            </div>




            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
               <label>Tienda</label>
               <select name="fk_tienda" class="form-control">
                @foreach ($tienda as $ti)
                 @if ($ti->codigo==$juridico->fk_tienda)
                <option value="{{$ti->codigo}}" selected>{{$ti->nombre}} ({{$ti->tipo}})</option>
                @else
                <option value="{{$ti->codigo}}">{{$ti->nombre}} ({{$ti->tipo}})</option>
                @endif
                @endforeach
               </select>
              </div>
             </div>


             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
							<button class="btn btn-primary" type="submit">Guardar</button>
 			        <button class="btn btn-danger" type="reset"><a href="../../juridico" style="color: inherit;">Cancelar</a></button>
              </div>
             </div>
           </div>

          {!!Form::close()!!}

@stop
