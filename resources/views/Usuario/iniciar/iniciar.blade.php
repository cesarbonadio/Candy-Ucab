@extends('layouts.usuario.login')
@section('iniciarSesion')

        @if (count($errors)>0)
                   <div class ="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{$error}}</li>
                        @endforeach
                      </ul>
                   </div>
                   @endif


	{!!Form::open(array('url'=>'usuario/iniciar','method'=>'POST','autocomplete'=>'off'))!!}
                    {{Form::token()}}

                    <div class="form-group">
                        <h4 class="offset-1">Datos de usuario</h4>
                        <br/>
                        <div class="row">
                            <label for="username" class="col-sm-3 offset-1">Nombre de Usuario</label>
                            <div class="col-sm-6">
                                <input class="form-control" placeholder="Nombre de Usuario" name="username" type="text" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 offset-1">Contraseña</label>
                        <div class="col-sm-6">
                            <input class="form-control" placeholder="Contraseña" type="password" name="password" />
                        </div>
                    </div>

                    <br/>
                    <div class="form-group">
                        <button type="submit" class="btn col-sm-2 offset-9">Continuar <span class="fa fa-arrow-right"></span></button>
                    </div>
                   {!!Form::close()!!}


@endsection

