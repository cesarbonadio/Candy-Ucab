<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use candyucab\Http\Requests;
use candyucab\Punto;
use Illuminate\Support\Facades\Redirect;
use candyucab\Http\Requests\PuntoFormRequest;
use DB;

class PuntoController extends Controller
{


  //
public function __construct(){

}

/*metodos asociados a las peticiones que se generan en la ruta de tipo resource*/

      public function index(Request $request){
        if($request){
          $query=trim($request->get('searchText')); //obtener el searchText para filtrar productos
          $puntos = DB::select('select * from punto');
          return view('administrar.punto.index',["puntos"=>$puntos,"searchText"=>$query]);
        }
      }

      public function create(){
          return view ("administrar.punto.create");
      }

      public function store(PuntoFormRequest $request){
          DB::update('update punto set fecha_fin=now() where fecha_fin is null');
          $punto = new Punto;
          $punto->valor = $request->get('valor');
          $punto->fecha_inicio = date('Y-m-d H:i:s');
          $punto->save();
          return Redirect::to('administrar/punto');
      }

      public function destroy($codigo){
        $punto = Punto::findOrFail($codigo);
        DB::delete('delete from punto_cliente where fk_punto = ?',[$codigo]);
        $punto->delete();
        return Redirect::to('administrar/punto');
      }

}
