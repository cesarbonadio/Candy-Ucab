@extends('layouts.usuario.diario')
@section('producto')



<br/>
<div class="carousel-item active">
    <div class="row">
    	<div style="text-align: center; background-color: #2b2e34;border-radius: 20px; margin-right: 0px;margin-left: 0px;" class="row col-sm-12">
    	<h2 class="align-middle" style="color:#FF4876;padding: 5px">El proximo diario dulce estara disponible el {{$diario[0]->fecha_emision}}</h2>
   		</div>
   		<br/>

    </div>
</div>


@endsection