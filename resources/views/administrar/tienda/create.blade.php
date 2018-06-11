@extends ('layouts.admin')
@section ('contenido')

   <div class="row">
     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
       <h3>Nueva tienda</h3>

       @if (count($errors)>0)
       <div class ="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
       </div>
       @endif

     </div>
   </div>



    {!!Form::open(array('url'=>'administrar/tienda','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}

    <div class ="row">

      <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
         <label for ="codigo">Código</label>
         <input type ="text" name="codigo"  value="{{old('codigo')}}" class="form-control" placeholder="Codigo...">
        </div>
    </div>

    <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
       <div class = "form-group">
         <label>Tipo</label>
          <select name="tipo" class="form-control">
            <option value="">...</option>
             <option value = "shop">CandyShop</option>
             <option value = "mini">Mini-CandyShop</option>
          </select>
        </div>
    </div>

    <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
       <div class = "form-group">
         <label for ="nombre">Nombre</label>
          <input type ="text" name="nombre"  value="{{old('nombre')}}" class="form-control" placeholder="Nombre de la tienda...">
        </div>
    </div>

    <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
       <div class = "form-group">
         <label>Ubicación de la tienda</label>
          <select name="fk_lugar" class="form-control">
            <option value="">...</option>
            @foreach ($lugares as $lugar)
             <option value = "{{$lugar->codigo}}">{{$lugar->nombre}} ({{$lugar->tipo}})</option>
            @endforeach
          </select>
        </div>
    </div>

    <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class = "form-group">
       <button class="btn btn-primary" type="submit">Guardar</button>
       <button class="btn btn-info" type="reset">Limpiar</button>
       <button class="btn btn-danger" type="reset"><a href="../tienda" style="color: inherit;">Cancelar</a></button>
      </div>
    </div>

    </div>


  {!!Form::close()!!}

@stop
