@extends ('layouts.admin')
@section ('contenido')
   <div class="row">
     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
       <h3>Nuevo Producto</h3>

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

     {!!Form::open(array('url'=>'administrar/producto','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
    {{Form::token()}}

    <div class ="row">

      <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
         <label for ="nombre">Nombre</label>
         <input type ="text" name="nombre"  value="{{old('nombre')}}" class="form-control" placeholder="Nombre...">
        </div>
    </div>

    <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
       <label for ="descripcion">Descripcion</label>
       <input type ="text area" name="descripcion" value="{{old('descripcion')}}" class="form-control" placeholder="Descripcion...">
      </div>
    </div>

    <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
       <div class = "form-group">
         <label for ="precio">Precio</label>
          <input type ="text" name="precio"  value="{{old('precio')}}" class="form-control" placeholder="Precio...">
        </div>
    </div>


    <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class="form-group">
       <label for ="ranking">Ranking</label>
       <input type ="text" name="ranking"  value="{{old('ranking')}}" class="form-control" placeholder="Ranking...">
      </div>
    </div>

    <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
       <div class = "form-group">
         <label>Tipo</label>
          <select name="fk_tipo" class="form-control">
            <option value="">...</option>
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
   <button class="btn btn-info" type="reset">Limpiar</button>
   <button class="btn btn-danger" type="reset"><a href="../producto" style="color: inherit;">Cancelar</a></button>
  </div>
</div>

    </div>




     {!!Form::close()!!}



@stop
