<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use candyucab\Http\Requests;
use candyucab\Medio;
use Illuminate\Support\Facades\Redirect;
use candyucab\Http\Requests\MedioFormRequest;
use DB;


class MedioController extends Controller
{


public function __construct(){}


      public function index(Request $request){
        if($request){
          $query=trim($request->get('searchText'));
          $medios =DB::table('medio_pago as m')
          ->leftjoin('juridico as j','m.fk_juridico','=','j.rif')
          ->leftjoin('naturale as n','m.fk_naturale','=','n.cedula')
          ->select('m.codigo','m.tipo','m.num_tarjeta','m.num_cheque','j.rif as rif','n.cedula as cedula')
          ->where('m.fk_juridico','LIKE','%'.$query.'%')
          ->orwhere('m.fk_naturale','LIKE','%'.$query.'%')
          ->orderBy('m.codigo','desc')
          ->paginate(7);
          return view('cliente.medio.index',["medio"=>$medios,"searchText"=>$query]);
        }
      }


      public function createNatural(){
          $naturales = DB::table('naturale')->get();
          return view ("cliente.medio.createNatural",["natural"=>$naturales]);
      }

      public function createJuridico(){
          $juridicos = DB::table('juridico')->get();
          return view ("cliente.medio.createJuridico",["juridico"=>$juridicos]);
      }


      public function store(MedioFormRequest $request){
          $medio = new Medio;

          $medio->tipo = $request->get('tipo');

          if ($request->get('tipo')=='tarjeta'){
            $medio->num_tarjeta = $request->get('num');
          } else if ($request->get('tipo')=='cheque'){
            $medio->num_cheque = $request->get('num');
          }

          $medio->fk_juridico = $request->get('fk_juridico');
          $medio->fk_naturale = $request->get('fk_naturale');
          $medio->save();

          return Redirect::to('cliente/medio');
      }


      public function destroy($codigo){
        $medio = Medio::findOrFail($codigo);
        DB::delete('delete from pago where fk_medio_pago = ?',[$codigo]); /*todavia no hace falta pero por si acaso*/
        $medio->delete();
        return Redirect::to('cliente/medio');
      }


}
