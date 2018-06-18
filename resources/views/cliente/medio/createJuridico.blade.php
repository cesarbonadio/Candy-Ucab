@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Medio de pago (Jurídico)</h3>

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


          {!! Form::open(array('url'=>'cliente/medio','method'=>'POST','autocomplete'=>'off')) !!}
          {{Form::token()}}

          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
            <label>Tipo</label>
            <select name="tipo" class="form-control">
              <option value="tarjeta">Tarjeta</option>
              <option value="cheque">Cheque</option>
            </select>
           </div>
           </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             	<label for="num">Numero de tarjeta o cheque</label>
             	<input type="text" name="num" class="form-control" placeholder="Numero..." value="{{old('num')}}">
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
             	<button class="btn btn-danger" type="reset"><a href="../medio" style="color: inherit;">Cancelar</a></button>
             	</div>
             </div>


          {!!Form::close()!!}
@stop
