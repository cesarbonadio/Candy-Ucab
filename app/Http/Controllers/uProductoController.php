<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use candyucab\Http\Requests;
use candyucab\Producto;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use candyucab\Http\Requests\uProductoFormRequest;
use DB;

class uProductoController extends uController
{

  //
public function __construct(){

}

/*metodos asociados a las peticiones que se generan en la ruta de tipo resource*/

      public function index(Request $request){
        if($request){

          $query=trim($request->get('searchText')); //obtener el searchText para filtrar productos
          $productos = DB::select('select * from producto');
          return view('usuario.index.index',["productos"=>$productos,"searchText"=>$query]);
        }
      }
      public function productoIndex(Request $request){
        if(isset($_GET["prodctoId"]))
        {
            $proId = $_GET["prodctoId"];

        }
        if($request){

          $query=trim($request->get('searchText')); //obtener el searchText para filtrar productos
          $productos = DB::select('select * from producto where codigo="'.$proId.'"');
          return view('usuario.producto.producto',["productos"=>$productos,"searchText"=>$query]);
        }
      }

      public function show($codigo){
        return view('usuario.index.show',["producto"=>Producto::findOrFail($codigo)]);
      }

}
