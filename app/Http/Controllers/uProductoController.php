<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use candyucab\Http\Requests;
use candyucab\Producto;
use candyucab\Presupuesto;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use candyucab\Http\Requests\uProductoFormRequest;
use candyucab\Http\Requests\CarritoFormRequest;


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

      public function store(CarritoFormRequest $request, $codigo){
          session_start();

          $producto = DB::select('select * from producto where codigo = "'.$_SESSION['datos_usu'].'"');
          $presupuesto = new Presupuesto;
          $mytime = Carbon::now();
          $presupuesto->fecha = $mytime;
          $presupuesto->total = ($producto->precio * $request->get('cantidad'));
          if($_SESSION['tipo'] == 'juridico'){
            $presupuesto->fk_juridico = $_SESSION['datos_usu'];
          }
          else if($_SESSION['tipo'] == 'natural'){
            $presupuesto->fk_naturale = $_SESSION['datos_usu'];
          }
          $tienda = DB::select('select * from tienda t, inventario i where t.codigo = i.c_tienda and c_producto = "'.$producto->codigo.'" and i.cantidad >= "'.$request->get('cantidad').'"');
          $presupuesto->fk_tienda_compra= $tienda->codigo;
          $presupuesto->fk_usuario= $_SESSION['id'];
          $presupuesto->save();

          return Redirect::to('usuario/carrito');
      }

      public function show($codigo){
        return view('usuario.index.show',["producto"=>Producto::findOrFail($codigo)]);
      }

}
