@extends('layouts.usuario.carrito')
@section('carrito')



<br/>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

          <div class="table-responsive">
   		<table class="table table-striped table-condensed table-hover">
    <thead>
      <tr>
        <th style="width: 5%"></th>
        <th style="width: 17%">Foto del producto</th>
        <th style="width: 17%">Nombre del producto</th>
        <th style="width: 17%">Precio</th>
        <th style="width: 17%">Cantidad</th>
        <th style="width: 17%">Sub-total</th>
        <th style="width: 10%"></th>

      </tr>
    </thead>
     <?php $total=0?>
      @foreach($presupuesto as $pre)
      <tr style="background-color: #2b2e34">
        <td style="position: relative; text-transform: capitalize; font-weight: bold;"><a href="" data-target="#modal-delete-{{$pre->codigo}}" data-toggle="modal" class="btn botonAddToCart"><span class="fa fa-times-circle fa-lg"></span></a></td>
        <td><img src="Imagenes/{{$pre->foto}}" class="img-fluid" style="border-radius: 5%; border: solid; "></td>
        <td style="position: relative; text-transform: capitalize; font-weight: bold">{{$pre->nombre}}</td>
        <td style="position: relative; text-transform: capitalize; font-weight: bold">{{$pre->precio}} bs</td>
        <td style="position: relative; text-transform: capitalize; font-weight: bold">{{$pre->cantidad}}</td>
        <td style="position: relative; text-transform: capitalize; font-weight: bold">{{$pre->subtotal}} bs</td>
        <td style="position: relative; text-transform: capitalize; font-weight: bold"><a href="/usuario/pago?codigo={{$pre->codigo}}" class="btn botonAddToCart">Pagar</a></td>
        <?php $total=$total+$pre->subtotal?>
      </tr>
              @include('usuario.carrito.modal')

      @endforeach
      


  </table>
  <table class="table" style="float: right; border:none;">
    <thead style="border:none;">
      <tr style=" border:none;">
        <th style="width: 5%; background-color:#FFE5D5; border:none;"></th>
        <th style="width: 17%; background-color:#FFE5D5; border:none;"></th>
        <th style="width: 17%; background-color:#FFE5D5; border:none;"></th>

        <th style="width: 17%; background-color:#FFE5D5; border:none;"></th>
        <th style="width: 17%; background-color:#FFE5D5; border:none;"></th>
        <th style="width: 17%; border-top-left-radius: 10px">Total</th>
        <th style="width: 10%; border-top-right-radius: 10px"></th>
      </tr>
    </thead>
    <tr style="background-color: #25262B">
        <td style=" background-color:#FFE5D5; border:none;"></td>
        <td style=" background-color:#FFE5D5; border:none;"></td>
        <td style=" background-color:#FFE5D5; border:none;"></td>
        <td style=" background-color:#FFE5D5; border:none;"></td>
        <td style=" background-color:#FFE5D5; border:none;"></td>
        <td style="position: relative; text-transform: capitalize; font-weight: bold; border:none; border-bottom-left-radius: 10px">{{$total}} bs</td>
        <td style="position: relative; text-transform: capitalize; font-weight: bold; border:none; border-bottom-right-radius: 10px"><a href="/usuario/pagarTodo" class="btn botonAddToCart">Pagar Todo</a></td>
      </tr>
    </table>
  
</div>
    </div>
  </div>


@endsection