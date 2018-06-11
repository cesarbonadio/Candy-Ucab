<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use candyucab\Http\Requests;
use candyucab\Tienda;
use Illuminate\Support\Facades\Redirect;
use candyucab\Http\Requests\TiendaFormRequest;
use DB;

class TiendaController extends Controller
{


      public function __construct(){}


      public function index(Request $request){
        if($request){
          $query=trim($request->get('searchText')); //obtener el searchText para filtrar  tiendas
          $tiendas = DB::select('select * from tienda');
          return view('administrar.tienda.index',["tiendas"=>$tiendas,"searchText"=>$query]);
        }
      }


      public function create(){
          $lugares = DB::table('lugar')->get();
          return view ("administrar.tienda.create",["lugares"=>$lugares]);
      }


      public function store(TiendaFormRequest $request){
          $tienda = new Tienda;
          $tienda->codigo = $request->get('codigo');
          $tienda->tipo = $request->get('tipo');
          $tienda->nombre = $request->get('nombre');
          $tienda->fk_lugar = $request->get('fk_lugar');
          $tienda->save();
          return Redirect::to('administrar/tienda');
      }


      public function show($codigo){
          $tienda = Tienda::findOrFail($codigo);
          $lugarArray = DB::select('select * from lugar where codigo = ? ',[$tienda->fk_lugar]);
          $lugar = $lugarArray[0];
          return view('administrar.tienda.show',["tienda"=>$tienda,"lugar"=>$lugar]);
      }

      public function edit($codigo){
          $tienda = Tienda::findOrFail($codigo);
          $lugarArray = DB::select('select * from lugar where codigo = ? ',[$tienda->fk_lugar]);
          $lugar = $lugarArray[0];
          $lugares = DB::table('lugar')->get();
          return view('administrar.tienda.edit',["tienda"=>$tienda,"lugares"=>$lugares,"lugar"=>$lugar]);
      }


      public function update(TiendaFormRequest $request,$codigo){
          $tienda = Tienda::findOrFail($codigo);
          $tienda->tipo = $request->get('tipo');
          $tienda->nombre = $request->get('nombre');
          $tienda->fk_lugar = $request->get('fk_lugar');
          $tienda->update();
          return Redirect::to('administrar/tienda');
      }


      public function destroy($codigo){
        $tienda = Tienda::findOrFail($codigo);
        /*borrar primero todos los apartamentos asociados a esa tienda*/
        DB::delete('delete from departamento where fk_tienda = ? ',[$tienda->codigo]);
        $tienda->delete();
        return Redirect::to('administrar/tienda');
      }

}
