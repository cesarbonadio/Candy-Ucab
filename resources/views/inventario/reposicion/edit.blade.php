@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Cambiar estatus de reposicion (pedido a fabrica) </h3>
    <h4>Num : {{$pedido->codigo}} </h4>

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


    {!! Form::model($pedido,['method'=>'PATCH','route'=>['reposicion.update',$pedido->codigo]]) !!}
    {{Form::token()}}


   <div class = "row">
    <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
     <div class="form-group">
      <label>Cambiar estatus</label>
        <select name="c_estatus" class="form-control">
          @foreach ($estatus as $est)
        <option value="{{$est->codigo}}">{{$est->descripcion}}</option>
          @endforeach
      </select>
     </div>
   </div>

     <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
     <div class="form-group">
       <br>
      <button class="btn btn-primary" type="submit">Guardar</button>
      <button class="btn btn-danger" type="reset"><a href="../../pedido" style="color: inherit;">Cancelar</a></button>
      </div>
     </div>
		 
  {!!Form::close()!!}

@stop
