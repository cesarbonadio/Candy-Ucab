<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use candyucab\Http\Requests;
use candyucab\Producto;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use candyucab\Http\Requests\ProductoFormRequest;
use DB;

class ProductoController extends Controller
{

  //
public function __construct(){

}

/*metodos asociados a las peticiones que se generan en la ruta de tipo resource*/

      public function index(Request $request){
        if($request){

          $query=trim($request->get('searchText')); //obtener el searchText para filtrar productos
          $productos = DB::select('select * from producto');
          return view('administrar.producto.index',["productos"=>$productos,"searchText"=>$query]);
        }
      }


      public function create(){
          $tipos = DB::table('tipo')->get();
          return view ("administrar.producto.create",["tipos"=>$tipos]);
      }


      public function store(ProductoFormRequest $request){
          $producto = new Producto;
          $producto->nombre = $request->get('nombre');
          $producto->descripcion = $request->get('descripcion');
          $producto->precio = $request->get('precio');
          $producto->ranking = $request->get('ranking');
          $producto->foto = $request->get('foto');
          $producto->fk_tipo = $request->get('fk_tipo');
          $producto->save();

          return Redirect::to('administrar/producto');
      }


      public function show($codigo){
        return view('administrar.producto.show',["producto"=>Producto::findOrFail($codigo)]);
      }

      public function edit($codigo){
        $producto = Producto::findOrFail($codigo);
        $tipos = DB::table('tipo')->get();
        return view('administrar.producto.edit',["producto"=>$producto,"tipos"=>$tipos]);
      }


      public function update(ProductoFormRequest $request,$codigo){
        $producto=Producto::findOrFail($codigo);
        $producto->nombre=$request->get('nombre');
        $producto->descripcion=$request->get('descripcion');
        $producto->precio = $request->get('precio');
        $producto->ranking = $request->get('ranking');
        $producto->foto = $request->get('foto');
        $producto->fk_tipo = $request->get('fk_tipo');
        $producto->update();
        return Redirect::to('administrar/producto');
      }


      public function destroy($codigo){
        $producto = Producto::findOrFail($codigo);
        $producto->delete();
        return Redirect::to('administrar/producto');
      }


}
