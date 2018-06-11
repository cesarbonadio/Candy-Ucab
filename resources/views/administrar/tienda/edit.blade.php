@extends ('layouts.admin')
@section ('contenido')

   <div class="row">
     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
       <h3>Editando Tienda:<strong>{{$tienda->codigo}}</strong></h3>

       @if (count($errors)>0)
       <div class ="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
       </div>
       @endif


    {!!Form::model($tienda,['method'=>'PATCH','route'=>['tienda.update',$tienda->codigo]])!!}
    {{Form::token()}}

    <div class ="row">


      <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class = "form-group">
          <label for ="nombre">Nombre</label>
          <input type ="text" name="nombre"  value="{{$tienda->nombre}}" class="form-control" placeholder="Nombre...">
        </div>
      </div>



      <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
         <div class = "form-group">
           <label>Tipo</label>
            <select name="tipo" class="form-control">

              <!--comparar para saber que mostrar dentro de option-->
              @if(strcmp($tienda->tipo,'mini')==0)
              <option value="{{$tienda->tipo}}">Mini-CandyShop</option>
              <option value = "shop">CandyShop</option>
              @else
              <option value="{{$tienda->tipo}}">CandyShop</option>
              <option value = "mini">Mini-CandyShop</option>
              @endif

            </select>
          </div>
      </div>


      <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
         <div class = "form-group">
           <label>Ubicación de la tienda</label>
            <select name="fk_lugar" class="form-control">
              <option value="{{$lugar->codigo}}">{{$lugar->nombre}} ({{$lugar->tipo}})</option>
              @foreach ($lugares as $l)
               <option value = "{{$l->codigo}}">{{$l->nombre}} ({{$l->tipo}})</option>
              @endforeach
            </select>
          </div>
      </div>





      <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class = "form-group">
        <br>
       <button class="btn btn-primary" type="submit">Guardar</button>
       <button class="btn btn-danger" type="reset"><a href="../../tienda" style="color: inherit;">Cancelar</a></button>
      </div>
      </div>

    </div>

     {!!Form::close()!!}


     </dic>
   </div>
@stop
