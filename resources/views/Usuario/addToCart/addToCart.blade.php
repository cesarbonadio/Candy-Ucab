@extends('layouts.usuario.carrito')
@section('carrito')



<br/>
<div class="carousel-item active">
    <div class="row">
    		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif
   		<table class="table table-striped">
    <thead>
      <tr>
        <th style="width: 33%">Foto del producto</th>
        <th style="width: 33%">Nombre del producto</th>
        <th style="width: 20%">Precio</th>
      </tr>
    </thead>
    <tbody>

      <tr style="background-color: #2b2e34">
        <td><img src="Imagenes/{{$producto[0]->foto}}" class="img-fluid" style="border-radius: 5%; border: solid;"></td>
        <td style="position: relative; text-transform: capitalize; font-weight: bold; top:30%">{{$producto[0]->nombre}}</td>
        <td style="position: relative; text-transform: capitalize; font-weight: bold; top:30%">{{$producto[0]->precio}} bs</td>

      </tr>
    </tbody>
  </table>
  {!! Form::open(array('url'=>'usuario/addToCart','method'=>'POST','autocomplete'=>'off')) !!}
  {{Form::token()}}
  	<div>	
  		<label for="cantidad"> Cantidad a pedir: 	</label>
  		<input type="number" name="cantidad" value="1" min="1">
  		<input type="text" style="display: none;" name="producto" value="{{$producto[0]->codigo}}">
		<button type="submit" class="btn botonAddToCart">Añadir</button>
  	</div>
  {!!Form::close()!!}

    </div>
</div>


@endsection