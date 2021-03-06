@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Pagar</h3>

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

		@if ($medio == null)
		<div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
			 <br>
			 <h4 >No tiene medios de pago este cliente <button class="btn btn-success" type="reset"><a href="../../pedido" style="color: inherit;">volver</a></button></h4>
		</div>
		@else

   <div class = "row">

    <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
     <div class="form-group">
      <label>Escoger medio de pago del cliente</label>
        <select name="fk_medio_pago" class="form-control">
        @foreach ($medio as $me)
        @if ($me->num_cheque==null)
        @if ($me->marca_tarjeta==null)
        <option value="{{$me->codigo}}">Tarjeta {{$me->num_tarjeta}}</option>
        @else
        <option value="{{$me->codigo}}">Tarjeta {{$me->num_tarjeta}} ({{$me->marca_tarjeta}})</option>
        @endif
        @elseif ($me->num_tarjeta==null)
        <option value="{{$me->codigo}}">Cheque {{$me->num_cheque}}</option>
        @endif
        @endforeach
       </select>
     </div>
   </div>


   <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
     <div class="form-group">
      <label for ="monto">Monto a pagar</label>
      <input type ="text" name="monto" class="form-control" placeholder="Monto..." autocomplete="off">
     </div>
   </div>


	 <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
		 <div class="form-group">
			<label for ="tipo_pago">tipo</label>
			<input type ="text" name="tipo_pago" class="form-control" value = "medios" readonly>
		 </div>
	 </div>


     <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
     <div class="form-group">
       <br>
      <button class="btn btn-primary" type="submit">Guardar</button>
      <button class="btn btn-danger" type="reset"><a href="../../pedido" style="color: inherit;">Cancelar</a></button>
      </div>
     </div>

		 @endif

  {!!Form::close()!!}

@stop
