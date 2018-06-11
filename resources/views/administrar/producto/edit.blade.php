@extends ('layouts.admin')
@section ('contenido')

   <div class="row">
     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
       <h3>Editando producto:<strong>{{$producto->codigo}}</strong></h3>

       @if (count($errors)>0)
       <div class ="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
       </div>
       @endif

     {!!Form::model($producto,['method'=>'PATCH','route'=>['producto.update',$producto->codigo]])!!}
    {{Form::token()}}

    <div class ="row">

      <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
         <label for ="nombre">Nombre</label>
         <input type ="text" name="nombre"  value="{{$producto->nombre}}" class="form-control" placeholder="Nombre...">
        </div>
    </div>

    <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
       <label for ="descripcion">Descripcion</label>
       <input type ="text area" name="descripcion" value="{{$producto->descripcion}}" class="form-control" placeholder="Descripcion...">
      </div>
    </div>

    <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
       <div class = "form-group">
         <label for ="precio">Precio</label>
          <input type ="text" name="precio"  value="{{$producto->precio}}" class="form-control" placeholder="Precio...">
        </div>
    </div>


    <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
       <label for ="ranking">Ranking</label>
       <input type ="text" name="ranking"  value="{{$producto->ranking}}" class="form-control" placeholder="Ranking...">
      </div>
    </div>

    <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
       <div class = "form-group">
         <label>Tipo</label>
          <select name="fk_tipo" class="form-control">
            <option value="{{$producto->fk_tipo}}">...</option>
            @foreach ($tipos as $tipo)
             <option value = "{{$tipo->codigo}}">{{$tipo->descripcion}}</option>
            @endforeach
          </select>
        </div>
    </div>

    <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
       <label>foto (deshabilitado por ahora)</label>
       <input disabled type ="file" name="foto"  class="form-control">
      </div>
    </div>



  <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
  <div class = "form-group">
   <button class="btn btn-primary" type="submit">Guardar</button>
   <button class="btn btn-danger" type="reset"><a href="../../producto" style="color: inherit;">Cancelar</a></button>
  </div>
  </div>

    </div>

     {!!Form::close()!!}


     </dic>
   </div>
@stop
