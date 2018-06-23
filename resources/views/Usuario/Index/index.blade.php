@extends('layouts.usuario.user')
@section('producto')



<div class="carousel-item active">
    <div class="row">
                                            @foreach($productos as $pro)
                                            @if ($pro->ranking < 5)
                                            <div class="col-sm-3 imagenMinimo">
                                                 <a href="producto?prodctoId={{$pro->codigo}}">
                                                    <div class="productsDiv">
                                                        <img src="Imagenes/{{$pro->foto}}" class="align-middle"/>

                                                    </div>
                                                </a>
                                                 <a href="producto?prodctoId={{$pro->codigo}}">
                                                    <h4 style="text-transform: capitalize;">{{ $pro->nombre}}</h4>
                                                </a>
                                                <h4>{{$pro->precio}} bs.</h4>

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

                                            </div>
                                            @endif
                                            @endforeach

    </div>
</div>



	<div class="carousel-item">
                                        <div class="row">
                                            
                                            @foreach($productos as $pro)
                                            @if ($pro->ranking > 4 and $pro->ranking < 9)
                                            <div class="col-sm-3 imagenMinimo">
                                                 <a href="producto?prodctoId={{$pro->codigo}}">
                                                    <div class="productsDiv">
                                                        <img src="Imagenes/{{$pro->foto}}" class="align-middle"/>

                                  
                                                    </div>
                                                </a>
                                                 <a href="producto?prodctoId={{$pro->codigo}}">
                                                    <h4 style="text-transform: capitalize;">{{ $pro->nombre}}</h4>
                                                </a>
                                                  <h4>{{$pro->precio}} bs.</h4>
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

                                            </div>
                                            @endif
                                            @endforeach
                                            
                                        </div>
	</div>
	<div class="carousel-item">
                                        <div class="row">
                                            @foreach($productos as $pro)
                                            @if ($pro->ranking > 8 and $pro->ranking < 13)
                                            <div class="col-sm-3 imagenMinimo">
                                                 <a href="producto?prodctoId={{$pro->codigo}}">
                                                    <div class="productsDiv">
                                                        <img src="Imagenes/{{$pro->foto}}" class="align-middle"/>

                                                    </div>
                                                </a>
                                                 <a href="producto?prodctoId={{$pro->codigo}}">
                                                    <h4 style="text-transform: capitalize;">{{ $pro->nombre}}</h4>
                                                </a>
                                                  <h4>{{$pro->precio}} bs.</h4>
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

                                            </div>
                                            @endif
                                            @endforeach
                                        </div>

@endsection