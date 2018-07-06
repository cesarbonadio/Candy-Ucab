<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use candyucab\Http\Requests;
use candyucab\Usuario;
use Illuminate\Support\Facades\Redirect;
use candyucab\Http\Requests\UsuarioFormRequest;
use DB;


class UsuarioController extends Controller
{

  public function _construct(){}


        public function index (Request $request)
        {
          if ($request){
          $query=trim($request ->get('searchText'));
          $usuarios=DB::table('usuario as u')
          ->leftjoin('rol as r','r.codigo','=','u.fk_rol')
          ->select('u.id','u.username','u.password','u.puntos','u.fk_juridico','u.fk_naturale','u.fk_empleado','r.descripcion as rolnom')
          ->where('u.id','LIKE','%'.$query.'%')
          ->orwhere('u.username','LIKE','%'.$query.'%')
          ->orderBy('u.id','asc')
          ->paginate(7);
          return view('gestion.usuario.index',["usuario"=>$usuarios,"searchText"=>$query]);
           }
        }

        public function create ()
        {
             $rol=DB::table('rol')->get();
             return view("gestion.usuario.create",["rol"=>$rol]);
        }

        public function store(UsuarioFormRequest $request)
        {
          /*creo el cliente natural*/
          $usuarios = new Usuario;
          $usuarios->id=$request->get('id');
          $usuarios->username=$request->get('username');
          $usuarios->password=$request->get('password');
          $usuarios->puntos=$request->get('puntos');
          $usuarios->fk_rol=$request->get('fk_rol');
          $usuarios->fk_juridico=$request->get('fk_juridico');
          $usuarios->fk_naturale=$request->get('fk_naturale');
          $usuarios->fk_empleado=$request->get('fk_empleado');

          $usuarios->save();


          return Redirect::to('gestion/usuario');
        }


        public function show($id)
        {
          return view ("gestion.usuario.show",["usuario"=>Usuario::findOrFail($id)]);
        }



         public function edit($id)
         {
            $usuarios=Usuario::findOrFail($id);
             $rol=DB::table('rol')->get();
          return view ("gestion.usuario.edit",["usuario"=>$usuarios,"rol"=>$rol]);
         }



         public function update(UsuarioFormRequest $request,$id)
         {
          $usuarios=Usuario::findOrFail($id);
          $usuarios->username=$request->get('username');
          $usuarios->password=$request->get('password');
          $usuarios->puntos=$request->get('puntos');
          $usuarios->fk_rol=$request->get('fk_rol');
          $usuarios->fk_juridico=$request->get('fk_juridico');
          $usuarios->fk_naturale=$request->get('fk_naturale');
          $usuarios->fk_empleado=$request->get('fk_empleado');
          $usuarios->update();

          return Redirect::to('gestion/usuario');
         }



          public function destroy($id)
          {
          $usuarios=Usuario::findOrFail($id);
          $usuarios->delete();
          return Redirect::to('gestion/usuario');
          }

}
