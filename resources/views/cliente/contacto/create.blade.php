@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Agregar Contacto a cliente Juridico</h3>


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

          {!! Form::open(array('url'=>'cliente/contacto','method'=>'POST','autocomplete'=>'off')) !!}
          {{Form::token()}}

          <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
             	<label for="cedula">Cedula</label>
             	<input type="text" name="cedula" class="form-control" placeholder="Cedula..." value="{{old('cedula')}}">
             </div>
           </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	<label for="nombre">Nombre</label>
             	<input type="text" name="nombre" class="form-control" placeholder="Nombre..." value="{{old('nombre')}}">
             </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	<label for="apellido">Apellido</label>
             	<input type="text" name="apellido" class="form-control" placeholder="Apellido..." value="{{old('apellido')}}">
             </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	<label for="funcion">Función</label>
             	<input type="text" name="funcion" class="form-control" placeholder="Funcion..." value="{{old('funcion')}}">
            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
              <label >Cliente Jurídico</label>
              <select name="fk_juridico" class="form-control">
                @foreach ($juridico as $j)
                <option value="{{$j->rif}}"> {{$j->d_social}} ({{($j->rif)}})</option>
                @endforeach
              </select>
             </div>
             </div>

             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
               <br>
              	<button class="btn btn-primary" type="submit">Guardar</button>
              	<button class="btn btn-danger" type="reset"><a href="../contacto" style="color: inherit;">Cancelar</a></button>
             	</div>
             </div>

           </div>
      {!!Form::close()!!}
@stop
