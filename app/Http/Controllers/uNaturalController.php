<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use candyucab\Http\Requests;
use candyucab\Natural;
use candyucab\uUsuario;
use candyucab\Telefono;
use Illuminate\Support\Facades\Redirect;
use candyucab\Http\Requests\uNaturalFormRequest;
use DB;


class uNaturalController extends uController
{

  public function _construct(){}


        public function index (Request $request)
        {
          $lugares=DB::table('lugar')->where('tipo','=','Parroquia')->get();
          if ($request){
          $query=trim($request ->get('searchText'));
          $naturales=DB::table('naturale as n')
          ->join('lugar as l','n.fk_lugar','=','l.codigo')
          ->join('tienda as t','n.fk_tienda','=','t.codigo')
          ->select('n.cedula','n.rif','n.correo','n.num_carnet','n.nombre','n.apellido','l.nombre as lugar','t.nombre as tienda')
          ->where('n.cedula','LIKE','%'.$query.'%')
          ->orwhere('n.nombre','LIKE','%'.$query.'%')
          ->orderBy('n.cedula','desc')
          ->paginate(7);
          return view('usuario.RegistroN.registro',["naturale"=>$naturales,"searchText"=>$query,'lugares'=>$lugares]);
           }
        }

        public function create ()
        {
             $lugar=DB::table('lugar')->get();
             $tienda=DB::table('tienda')->get();
             return view("usuario.RegistroJ.registro",["lugares"=>$lugar,"tienda"=>$tienda]);
        }

        public function store(uNaturalFormRequest $request)
        {
          $naturales=new Natural;
          $naturales->cedula=$request->get('cedula');
          $naturales->rif=$request->get('rif');
          $naturales->num_carnet=$request->get('num_carnet');
          $naturales->correo=$request->get('correo');
          $naturales->nombre=$request->get('nombre');
          $naturales->apellido=$request->get('apellido');
          $naturales->fk_lugar=$request->get('fk_lugar');
          $naturales->fk_tienda=$request->get('fk_tienda');
          $naturales->save();

          if($request->get('user')){
            $usuario = new uUsuario;
            $usuario->username=$request->get('user');
            $usuario->password=$request->get('pass');
            $usuario->puntos='0';
            $usuario->fk_rol='3';
            $usuario->fk_naturale=$request->get('cedula');
            $usuario->save();
          }


             if ($request->get('telefono')){ //valida si coloco telefono
                  /*creo el telefono*/
                $telefono = new Telefono;
                $telefono->valor = $request->get('telefono');
                $telefono->tipo = $request->get('tipo_telefono');
                $telefono->fk_naturale = $request->get('cedula');
                $telefono->save();
             }


          return Redirect::to('usuario/index');
        }

      

        public function show($cedula)
        {
          return view ("usuario.RegistroJ.registro",["naturale"=>Naturales::findOrFail($cedula)]);
        }

         public function edit($cedula)
        {
            $naturales=Natural::findOrFail($cedula);
            $lugar=DB::table('lugar')->get();
            $tienda=DB::table('tienda')->get();
          return view ("usuario.RegistroJ.registro",["naturale"=>$naturales,"lugar"=>$lugar,"tienda"=>$tienda]);
        }

         public function update(uNaturalFormRequest $request,$cedula)
         {
          $naturales=Natural::findOrFail($cedula);
          $naturales->cedula=$request->get('cedula');
          $naturales->rif=$request->get('rif');
          $naturales->correo=$request->get('correo');
          $naturales->num_carnet=$request->get('num_carnet');
          $naturales->nombre=$request->get('nombre');
          $naturales->apellido=$request->get('apellido');
          $naturales->fk_lugar=$request->get('fk_lugar');
          $naturales->fk_tienda=$request->get('fk_tienda');
          $naturales->update();
          return Redirect::to('cliente/natural');
         }

          public function destroy($cedula)
          {
          $naturales=Natural::findOrFail($cedula);
          $naturales->delete();
          return Redirect::to('cliente/natural');
          }
}
