<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use candyucab\Http\Requests;
use candyucab\Juridico;
use candyucab\Telefono;
use Illuminate\Support\Facades\Redirect;
use candyucab\Http\Requests\JuridicoFormRequest;
use DB;

class JuridicoController extends Controller
{

  public function _construct(){

    }

    public function index (Request $request)
    {
      if ($request){
      $query=trim($request ->get('searchText'));
      $juridicos=DB::table('juridico as j')
      ->leftjoin('lugar as l','j.fk_lugar','=','l.codigo')
      ->leftjoin('lugar as lf','j.fk_lugar_fiscal','=','lf.codigo')
      ->leftjoin('tienda as t','j.fk_tienda','=','t.codigo')
      ->select('j.rif','j.num_carnet','j.correo','j.d_social','j.r_social','j.pagina_web','j.capital','l.nombre as lugar','lf.nombre as lugarf','t.nombre as tienda')
     	->where('j.d_social','LIKE','%'.$query.'%')
      ->orderBy('j.d_social','desc')
     	->paginate(7);
    	return view('cliente.juridico.index',["juridico"=>$juridicos,"searchText"=>$query]);
      }
    }

    public function create ()
    {
      $lugar=DB::table('lugar')->get();
      $tienda=DB::table('tienda')->get();
    	return view("cliente.juridico.create",["lugar"=>$lugar,"tienda"=>$tienda]);
    }

    public function store (JuridicoFormRequest $request)
    {
      /*primero va a guardar el cliente juridico*/
    	$juridico=new Juridico;
    	$juridico->rif=$request->get('rif');
    	$juridico->correo=$request->get('correo');
    	$juridico->d_social=$request->get('d_social');
    	$juridico->r_social=$request->get('r_social');
    	$juridico->pagina_web=$request->get('pagina_web');
    	$juridico->capital=$request->get('capital');
    	$juridico->fk_lugar=$request->get('fk_lugar');
    	$juridico->fk_lugar_fiscal=$request->get('fk_lugar_fiscal');
      $juridico->fk_tienda=$request->get('fk_tienda');
      if ($request->get('fk_tienda')) { //agregando el carnet
       $juridico->num_carnet = $request->get('fk_tienda').'-'.$request->get('rif');
      }
    	$juridico->save();


      if ($request->get('telefono')){ //valida si coloco telefono
           /*creo el telefono*/
         $telefono = new Telefono;
         $telefono->valor = $request->get('telefono');
         $telefono->tipo = $request->get('tipo_telefono');
         $telefono->fk_juridico = $request->get('rif');
         $telefono->save();
      }

    	return Redirect::to('cliente/juridico');
    }



    public function show($rif)
    {
    	return view ("cliente.juridico.show",["juridico"=>Juridico::findOrFail($rif)]);
    }



     public function edit($rif)
     {
      $juridico=Juridico::findOrFail($rif);
      $lugar=DB::table('lugar')->get();
      $tienda=DB::table('tienda')->get();
    	return view ("cliente.juridico.edit",["juridico"=>$juridico,"lugar"=>$lugar,"tienda"=>$tienda]);
     }



     public function update(JuridicoFormRequest $request,$rif)
     {
      /*primero va a guardar el cliente juridico*/
    	$juridico=Juridico::findOrFail($rif);
    	$juridico->rif=$request->get('rif');
    	$juridico->correo=$request->get('correo');
    	$juridico->d_social=$request->get('d_social');
    	$juridico->r_social=$request->get('r_social');
    	$juridico->pagina_web=$request->get('pagina_web');
    	$juridico->capital=$request->get('capital');
    	$juridico->fk_lugar=$request->get('fk_lugar');
    	$juridico->fk_lugar_fiscal=$request->get('fk_lugar_fiscal');
      if ($request->get('fk_tienda')) { //agregando el carnet
       $juridico->fk_tienda=$request->get('fk_tienda');
       $juridico->num_carnet = $request->get('fk_tienda').'-'.$request->get('rif');
      }
    	$juridico->update();


      if ($request->get('telefono')){ //valida si coloco telefono
           /*creo el telefono*/
         $telefono = new Telefono;
         $telefono->valor = $request->get('telefono');
         $telefono->tipo = $request->get('tipo_telefono');
         $telefono->fk_juridico = $request->get('rif');
         $telefono->save();
      }

    	return Redirect::to('cliente/juridico');
     }



     public function destroy($rif)
     {
     	$juridico=Juridico::findOrFail($rif);
      DB::delete('delete from telefono where fk_juridico = ?',[$rif]);
      DB::delete('delete from contacto where fk_juridico = ?',[$rif]);
     	$juridico->delete();
     	return Redirect::to('cliente/juridico');
     }


}
