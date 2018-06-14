<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use candyucab\Http\Requests;
use candyucab\Juridico;
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
      ->join('lugar as l','j.fk_lugar','=','l.codigo')
      ->join('lugar as lf','j.fk_lugar_fiscal','=','lf.codigo')
      ->join('tienda as t','j.fk_tienda','=','t.codigo')
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
    	$juridico=new Juridico;
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
    	$juridico->save();
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
    	return Redirect::to('cliente/juridico');
     }

     public function destroy($rif)
     {
     	$juridico=Juridico::findOrFail($rif);
     	$juridico->delete();
     	return Redirect::to('cliente/juridico');
     }

}
