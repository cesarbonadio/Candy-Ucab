<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use candyucab\Http\Requests;
use candyucab\Juridico;
use candyucab\uUsuario;
use candyucab\Telefono;
use candyucab\Contacto;
use Illuminate\Support\Facades\Redirect;
use candyucab\Http\Requests\uJuridicoFormRequest;
use DB;

class uJuridicoController extends uController
{

  public function _construct(){

    }


    public function index (Request $request)
    {
      $lugares=DB::table('lugar')->where('tipo','=','Parroquia')->get();

      if ($request){
      $query=trim($request ->get('searchText'));
      $juridicos=DB::table('juridico as j')
      ->join('lugar as l','j.fk_lugar','=','l.codigo')
      ->join('lugar as lf','j.fk_lugar_fiscal','=','lf.codigo')
      ->join('tienda as t','j.fk_tienda','=','t.codigo')
      ->select('j.rif','j.num_carnet','j.correo','j.d_social','j.r_social','j.pagina_web','j.capital','l.nombre as lugar','lf.nombre as lugarf','t.nombre as tienda')
     	->where('j.d_social','LIKE','%'.$query.'%')
      ->orderBy('j.d_social','desc')
     	->paginate(7);
    	return view('usuario.RegistroJ.registro',["juridico"=>$juridicos,"searchText"=>$query,'lugares'=>$lugares]);
      }
    }

    public function create ()
    {
         $lugares=DB::table('lugar')->where('tipo','=','Parroquia')->get();
         return view('usuario.registroJ.registro',['lugares'=>$lugar]);
    }

    public function store (uJuridicoFormRequest $request)
    {
    	$juridico=new Juridico;
    	$juridico->rif=$request->get('rif');
    	$juridico->correo=$request->get('correo');
    	$juridico->d_social=$request->get('d_social');
    	$juridico->r_social=$request->get('r_social');
    	$juridico->pagina_web=$request->get('pagina_web');
    	$juridico->capital=$request->get('capital');
    	$juridico->fk_lugar=$request->get('fk_lugar');
    	$juridico->fk_lugar_fiscal=$request->get('fk_lugar_fiscal');
    	$juridico->save();

      if($request->get('user')){
        $usuario = new uUsuario;
        $usuario->username=$request->get('user');
        $usuario->password=$request->get('pass');
        $usuario->puntos='0';
        $usuario->fk_rol='3';
        $usuario->fk_juridico=$request->get('rif');
        $usuario->save();
      }

             if ($request->get('telefono')){ //valida si coloco telefono
                  /*creo el telefono*/
                $telefono = new Telefono;
                $telefono->valor = $request->get('telefono');
                $telefono->tipo = $request->get('tipo_telefono');
                $telefono->fk_juridico = $request->get('rif');
                $telefono->save();
             }
      if($request->get('cedula')){
        $contacto= new Contacto;
        $contacto->cedula = $request->get('cedula');
        $contacto->nombre = $request->get('nombre');
        $contacto->apellido = $request->get('apellido');
        $contacto->funcion = $request->get('funcion');
        $contacto->fk_juridico = $request->get('rif');
        $contacto->save();
      }



      return Redirect::to("usuario/index");    }


    public function show($rif)
    {
      $juridico = Juridico::findOrFail($rif);
      $lugarArray = DB::select('select * from lugar where codigo = ? ',[$juridico->fk_lugar]);
      $lugar = $lugarArray[0];
    	return view ("usuario.registroJ.registro",["juridico"=>$juridico,"lugar"=>$lugar]);
    }

     public function edit($rif)
     {
      $juridico=Juridico::findOrFail($rif);
      $lugares = DB::table('lugar')->get();
      $tienda=DB::table('tienda')->get();
    	return view ("usuario.registroJ.registro",["juridico"=>$juridico,"lugares"=>$lugares,"tienda"=>$tienda]);
     }

     public function update(uJuridicoFormRequest $request,$rif)
     {
    	$juridico=Juridico::findOrFail($rif);
    	$juridico->rif=$request->get('rif');
    	$juridico->num_carnet=$request->get('num_carnet');
    	$juridico->correo=$request->get('correo');
    	$juridico->d_social=$request->get('d_social');
    	$juridico->r_social=$request->get('r_social');
    	$juridico->pagina_web=$request->get('pagina_web');
    	$juridico->capital=$request->get('capital');
    	$juridico->fk_lugar=$request->get('fk_lugar');
    	$juridico->fk_lugar_fiscal=$request->get('fk_lugar_fiscal');
    	$juridico->fk_tienda=$request->get('fk_tienda');
    	$juridico->update();
    	return Redirect::to('usuario/usuarioJ');
     }

     public function destroy($rif)
     {
     	$juridico=Juridico::findOrFail($rif);
     	$juridico->delete();
     	return Redirect::to('usuario/usuarioJ');
     }

}
