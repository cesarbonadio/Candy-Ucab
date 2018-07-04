@extends('layouts.usuario.diario')
@section('producto')



<br/>
<div class="carousel-item active">
    <div class="row">
    	<div style="text-align: center; background-color: #2b2e34; border-top-left-radius: 20px;border-top-right-radius: 20px; margin-right: 0px;margin-left: 0px;" class="row col-sm-12">
    	<h2 class="align-middle" style="color:#FF4876;padding: 5px">DIARIO UCAB N° {{$diario[0]->codigo}}</h2>
   		</div>
   		<br/>
   		<div style="background-color: white; border-right: 5px solid #2b2e34; border-left: 5px solid #2b2e34; margin-right: 0px;margin-left: 0px;" class="row">
   			<h4 style="text-align:justify; margin: 10px">{{$diario[0]->descripcion}}</h4>
   		</div>
   										<div style="background-color: white;border-bottom-left-radius: 20px;border-bottom-right-radius: 20px; border:5px solid #2b2e34; border-top:none; margin-right: 0px;margin-left: 0px;" class="row col-sm-12">
   											<div class="col-sm-6">
   												<h5 style="text-transform: uppercase; text-align: justify; margin-top: 20px; margin-left: -5px; float: left;">{{$descuento[0]->descripcion}}</h5>
   											</div>
                        <?php if(isset($descuento[1]->descripcion)){ ?> 
   											<div class="col-sm-6">
   												<h5 style="text-transform: uppercase; text-align: justify; margin-top: 20px; margin-left: -5px; margin-bottom: 20px; float: left;">{{$descuento[1]->descripcion}}</h5>
   											</div>
                        <<?php } ?>
                                            @foreach($producto as $pro)
                                            <?php if(isset($descuento[$cont]->descripcion)){ ?> 

                                            <br/>
                                            <div class="col-sm-6 imagenMinimo">
                                            	<div class="col-sm-6">
                                                <a href="producto?prodctoId={{$pro->codigo}}">
                                                    <div style="border:1px solid black" class="productsDiv">
                                                        <img src="Imagenes/{{$pro->foto}}" class="align-middle"/>

                                                    </div>
                                                </a>
                                                <a href="producto?prodctoId={{$pro->codigo}}">
                                                    <h4 style="text-transform: capitalize;">{{ $pro->nombre}}</h4>
                                                </a>
                                                <h4>{{$pro->precio}} bs. -{{$descuento[$cont++]->porcentaje}}%</h4>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked" data-></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x checked"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>
                                                </span>
                                                <span class="fa-stack fa-fw">
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x checked"></i>                                                                                                    
                                                </span>
                                                <span class="fa-stack fa-fw">                                                   
                                                    <i class="fas fa-star fa-stack-1x"></i>
                                                    <i class="fas fa-star-half fa-stack-1x"></i>
                                                </span>
                                                <button class="btn botonAddToCart">ADD TO CART</button>

                                            	<h6 style="text-transform: uppercase; text-align: justify; margin-top: 20px; margin-left: -5px">{{$pro->descripcion}}</h6>


                                            </div>
                                            
                                            </div>

                                                                  <<?php } ?>

                                            @endforeach
                                            <br/>
                                        </div>

    </div>
</div>


@endsection