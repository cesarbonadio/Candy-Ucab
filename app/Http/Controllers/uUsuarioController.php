<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use candyucab\Http\Requests;
use candyucab\uUsuario;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use candyucab\Http\Requests\LoginFormRequest;
use DB;

class uUsuarioController extends Controller
{

  //
public function _construct(){

}

/*metodos asociados a las peticiones que se generan en la ruta de tipo resource*/

      public function index(Request $request){

        if($request){

          $query=trim($request->get('searchText')); //obtener el searchText para filtrar productos
          $usuario = DB::select('select * from usuario');
          return view('usuario.iniciar.iniciar',["usuario"=>$usuario]);
        }
      }

      public function index2(Request $request){

        if($request){

          $query=trim($request->get('searchText')); //obtener el searchText para filtrar productos
          $usuario = DB::select('select * from usuario');
          return view('usuario.perfil.perfil',["usuario"=>$usuario]);
        }
      }

      public function store (LoginFormRequest $request) {
            $usuario = DB::select('select * from usuario where username = "'.$request->get('username').'" and "'.$request->get('password').'" = password');
              if(!empty($usuario)){
              session_start();
              $_SESSION['ini'] = 1;
              $_SESSION['id']= $usuario[0]->id;
              $_SESSION['username'] = $usuario[0]->username;
              $_SESSION['password'] = $usuario[0]->password;
              $_SESSION['puntos'] = $usuario[0]->puntos;  
              $_SESSION['rol'] = $usuario[0]->fk_rol;  
              if($usuario[0]->fk_juridico != NULL){
                $_SESSION['datos_usu'] = $usuario[0]->fk_juridico; 
                $_SESSION['tipo']= 'juridico';
              }
              else if($usuario[0]->fk_naturale != NULL){
                $_SESSION['datos_usu'] = $usuario[0]->fk_naturale;  
                $_SESSION['tipo']= 'natural';
              }
              else{
                $_SESSION['datos_usu'] = $usuario[0]->fk_empleado;
                $_SESSION['tipo']= 'empleado';

              }
              return Redirect::to('usuario/index');

            }
          


     return Redirect::to('usuario/iniciar');
    }

    public function show($request){
      return view ("usuario.iniciar.iniciar");
    }

    public function indexCerrar(Request $request){
                    session_start();
              $_SESSION['id'] = NULL;

              $_SESSION['ini'] = 0;
              $_SESSION['username'] = '';
              $_SESSION['password'] = '';
              $_SESSION['puntos'] = 0;  
              $_SESSION['rol'] = 3;  
              $_SESSION['datos_usu'] = NULL;
              $_SESSION['tipo']= NULL;



              return Redirect::to('usuario/index');
    }


}
