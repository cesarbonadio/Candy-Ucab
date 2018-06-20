@extends ('layouts.admin')
@section ('contenido')

   <div class="row">
     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
       <h3>Editanto Contacto: <strong>{{$contacto->cedula}}</strong></h3>

       @if (count($errors)>0)
       <div class ="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
       </div>
       @endif

    {!!Form::model($contacto,['method'=>'PATCH','route'=>['contacto.update',$contacto->cedula]])!!}
    {{Form::token()}}

    <div class="row">
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
       <div class="form-group">
        <label for="cedula">Cedula</label>
        <input type="text" name="cedula" class="form-control" placeholder="Cedula..." value="{{$contacto->cedula}}">
       </div>
     </div>

      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Nombre..." value="{{$contacto->nombre}}">
       </div>
      </div>

      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" class="form-control" placeholder="Apellido..." value="{{$contacto->apellido}}">
       </div>
      </div>

      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
        <label for="funcion">Función</label>
        <input type="text" name="funcion" class="form-control" placeholder="Funcion..." value="{{$contacto->funcion}}">
      </div>
      </div>


      <div class = "col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div class = "form-group">
       <button class="btn btn-primary" type="submit">Guardar</button>
       <button class="btn btn-danger" type="reset"><a href="../../contacto" style="color: inherit;">Cancelar</a></button>
      </div>
      </div>

    </div>
     {!!Form::close()!!}
     </dic>
   </div>
@stop
