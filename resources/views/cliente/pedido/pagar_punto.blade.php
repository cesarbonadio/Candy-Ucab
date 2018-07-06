@extends ('layouts.admin')
@section ('contenido')



<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Pagar con puntos</h3><br>

		@if (($cantidad[0]->total == 0))
		<h4>Este cliente no tiene puntos <button class="btn btn-success" type="reset"><a href="../../pedido" style="color: inherit;">volver</a></button></h4>
		@else

    <h4>Cantidad de puntos del cliente : {{$cantidad[0]->cantidad}}</h4>
    <h4>Tiene: {{$cantidad[0]->total}} Bs en puntos</h4>
    <br>


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


    {!! Form::model($pedido,['method'=>'PATCH','route'=>['pedido.update',$pedido->codigo]]) !!}
     {{Form::token()}}

      <div class = "row">

      <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
         <label for ="monto">Monto</label>
         <input type ="text" name="monto" class="form-control" placeholder="Monto..." autocomplete="off">
        </div>
      </div>

      <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
         <label for ="tipo_pago">tipo</label>
         <input type ="text" name="tipo_pago" class="form-control" value = "puntos" readonly>
        </div>
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

@endif

@stop
