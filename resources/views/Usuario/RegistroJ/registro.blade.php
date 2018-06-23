@extends('layouts.usuario.registro')
@section('registrarse')

<div class="container">
        <div class="row registroDiv">
            <div class="col-sm-12" >
                    <br/>
                    <div><h4 style="text-align:center">Bienvenido a Candy Ucab</h4></div>
                    <br/>
                    @if (count($errors)>0)
                   <div class ="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{$error}}</li>
                        @endforeach
                      </ul>
                   </div>
                   @endif
                    {!!Form::open(array('url'=>'usuario/registroJ','method'=>'POST','autocomplete'=>'off'))!!}
                    {{Form::token()}}
                    <div class="form-group row">
                        <label for="rif" class="col-sm-3 offset-1">RIF de la compañia</label>
                        <div class="col-sm-6">
                            <input class="form-control" placeholder="RIF" name="rif" type="text" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="d_social" class="col-sm-3 offset-1">Denominación comercial</label>
                        <div class="col-sm-6">
                            <input class="form-control" placeholder="Denominación comercial" type="text" name="d_social" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="r_social" class="col-sm-3 offset-1">Razón social</label>
                        <div class="col-sm-6">
                            <input class="form-control" placeholder="Razón social" type="text" name="r_social" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="correo" class="col-sm-3 offset-1">Correo</label>
                        <div class="col-sm-6">
                            <input class="form-control" placeholder="Correo" type="text" name="correo" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pagina_web" class="col-sm-3 offset-1">Pagina web</label>
                        <div class="col-sm-6">
                            <input class="form-control" placeholder="Pagina web" type="text" name="pagina_web" />
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="lk_lugar" class="col-sm-3 offset-1">Dirección fiscal</label>
                        <div class="col-sm-6">
                            <select name="fk_lugar_fiscal" class="form-control">
                                <option value="">...</option>
                                @foreach ($lugares as $lugar)
                                    <option value = "{{$lugar->codigo}}">{{$lugar->nombre}} ({{$lugar->tipo}})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lk_lugar" class="col-sm-3 offset-1">Direccion fisica</label>
                        <div class="col-sm-6">
                            <select name="fk_lugar" class="form-control">
                                <option value="">...</option>
                                @foreach ($lugares as $lugar)
                                    <option value = "{{$lugar->codigo}}">{{$lugar->nombre}} ({{$lugar->tipo}})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="capital" class="col-sm-3 offset-1">Capital de la empresa disponible</label>
                        <div class="col-sm-6">
                            <input class="form-control" placeholder="Capital" type="text" name="capital" />
                        </div>
                    </div>

                    <div class="form-group">
                        <h4 class="offset-1">Datos de telefono</h4>
                        <br/>
                        <div class="row">
                            <label for="telefono" class="col-sm-3 offset-1">Numero de telefono</label>
                            <div class="col-sm-6">
                                <input class="form-control" placeholder="Telefono" type="text" name="telefono" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                              <label class="col-sm-3 offset-1" for="tipo_telefono">Tipo de telefono</label>
                              <div class="col-sm-6"> 
                                <select name="tipo_telefono" class="form-control">
                                    <option value="">Tipo...</option>
                                    <option value="radio">radio</option>
                                    <option value="fax">fax</option>
                                    <option value="movil">movil</option>
                                    <option value="fijo">fijo</option>
                                    <option value="trabajo">trabajo</option>
                                    <option value="casa">casa</option>
                                </select>
                            </div>
                    </div>

                    <div class="form-group">
                        <h4 class="offset-1">Datos de contacto</h4>
                        <br/>
                        <div class="row">
                            
                        <label for="cedula" class="col-sm-3 offset-1">Cedula de la persona de contacto</label>
                        <div class="col-sm-6">
                            <input class="form-control" placeholder="Cedula" type="text" name="cedula" />
                        </div>
                    </div>
                    </div>
                    <div class="form-group row">
                        <label for="apellido" class="col-sm-3 offset-1">Apellido de la persona de contacto</label>
                        <div class="col-sm-6">
                            <input class="form-control" placeholder="Apellido" type="text" name="apellido" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nombre" class="col-sm-3 offset-1">Nombre de la persona de contacto</label>
                            <div class="col-sm-6">
                                <input class="form-control" placeholder="Nombre" type="text" name="nombre" />
                            </div>
                        </div>
                    <div class="form-group row">
                        <label for="funcion" class="col-sm-3 offset-1">Cargo de la persona de contacto</label>
                        <div class="col-sm-6">
                            <input class="form-control" placeholder="Cargo" type="text" name="funcion" />
                        </div>
                    </div>

                    <div class="form-group">
                        <h4 class="offset-1">Datos de usuario</h4>
                        <br/>
                        <div class="row">
                            <label for="user" class="col-sm-3 offset-1">Nombre de Usuario</label>
                            <div class="col-sm-6">
                                <input class="form-control" placeholder="Nombre de Usuario" name="user" type="text" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pass" class="col-sm-3 offset-1">Contraseña</label>
                        <div class="col-sm-6">
                            <input class="form-control" placeholder="Contraseña" type="text" name="pass" />
                        </div>
                    </div>

                    <br/>
                    <div class="form-group">
                        <button type="submit" class="btn col-sm-2 offset-9">Continuar <span class="fa fa-arrow-right"></span></button>
                    </div>
                   {!!Form::close()!!}
            </div>
        </div>
    </div>


@endsection