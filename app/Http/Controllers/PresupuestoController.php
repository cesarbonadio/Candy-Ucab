<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use candyucab\Http\Requests;
use candyucab\Presupuesto;
use candyucab\Producto_presupuesto;
use candyucab\Producto;
use candyucab\Pedido;
use Illuminate\Support\Facades\Redirect;
use candyucab\Http\Requests\PresupuestoFormRequest;
use DB;


class PresupuestoController extends Controller
{



public function __construct(){/**/}


      public function index(Request $request){

          if($request){
          $query=trim($request->get('searchText'));
          $presupuestos =DB::table('presupuesto as p')

          ->leftjoin('juridico as j','p.fk_juridico','=','j.rif')
          ->leftjoin('naturale as n','p.fk_naturale','=','n.cedula')
          ->leftjoin('tienda as t','p.fk_tienda',"=",'t.codigo')
          ->leftjoin('usuario as u','p.fk_usuario','=','u.id')

          ->select('p.codigo','p.total','p.fecha','j.rif as rif','n.cedula as cedula','t.codigo as tienda','u.id as usuario')
          ->where('p.codigo','LIKE','%'.$query.'%')
          ->orderBy('p.total','desc')
          ->paginate(7);

          return view('cliente.presupuesto.index',["presupuesto"=>$presupuestos,"searchText"=>$query]);
          }

      }


      public function createNatural(){
          $tiendas = DB::table('tienda')->get();
          return view ("cliente.presupuesto.createNatural",["tienda"=>$tiendas]);
      }

      public function createJuridico(){
          $tiendas = DB::table('tienda')->get();
          return view ("cliente.presupuesto.createJuridico",["tienda"=>$tiendas]);
      }


      public function store(PresupuestoFormRequest $request){
          $presupuesto = new Presupuesto;
          $presupuesto->fecha = date('Y-m-d H:i:s');
          $presupuesto->fk_naturale = $request->get('fk_naturale');
          $presupuesto->fk_juridico = $request->get('fk_juridico');
          $presupuesto->total = '0';
          $presupuesto->save();
          $acumulado = 0;

          for ($i = 1; $i <= 5; $i++) {
                if ($request->get('producto'.$i)){
              $producto = Producto::findOrFail($request->get('producto'.$i));
              $producto_presupuesto = new Producto_presupuesto;
              $producto_presupuesto->cantidad = $request->get('cantidad'.$i);
              $producto_presupuesto->precio = $producto->precio;
              $producto_presupuesto->c_producto = $producto->codigo;
              $producto_presupuesto->c_presupuesto = $presupuesto->codigo;
              $producto_presupuesto->save();
              $acumulado = $acumulado + ($producto->precio*$producto_presupuesto->cantidad);
            }
            else break;
          }

          //cuando el presupuesto se genera en fisico, el pedido se genera directamente
          $pedido = new Pedido;
          $pedido->fecha = date('Y-m-d H:i:s');
          $pedido->c_presupuesto = $presupuesto->codigo;
          $pedido->save();

          $presupuesto->total= $acumulado;
          $presupuesto->save();
          return Redirect::to('cliente/presupuesto');
      }




        public function edit($codigo)
        {
           $presupuesto = Presupuesto::findOrFail($codigo);
           $tienda=DB::table('tienda')->get();
           return view ("cliente.presupuesto.edit",["tienda"=>$tienda,"presupuesto"=>$presupuesto]);
        }



        public function update(PresupuestoFormRequest $request, $codigo){
          $presupuesto = Presupuesto::findOrFail($codigo);
          $presupuesto->fecha = date('Y-m-d H:i:s');
          $presupuesto->save();
          $acumulado = 0;
          for ($i = 1; $i <= 5; $i++) {
                if ($request->get('producto'.$i)){
              $producto = Producto::findOrFail($request->get('producto'.$i));
              $producto_presupuesto = new Producto_presupuesto;
              $producto_presupuesto->cantidad = $request->get('cantidad'.$i);
              $producto_presupuesto->precio = $producto->precio;
              $producto_presupuesto->c_producto = $producto->codigo;
              $producto_presupuesto->c_presupuesto = $presupuesto->codigo;
              $producto_presupuesto->save();
              $acumulado = $acumulado + ($producto->precio*$producto_presupuesto->cantidad);
            }
            else break;
          }
          $presupuesto->total= $presupuesto->total+ $acumulado;
          $presupuesto->save();
          return Redirect::to('cliente/presupuesto');
        }


      public function destroy($codigo){
        $presupuesto = Presupuesto::findOrFail($codigo);
        //elimino todos los n a n entre producto y presupuesto
        DB::delete('delete from producto_presupuesto where c_presupuesto = ?',[$codigo]);
        DB::delete('delete from pago pa inner join pedido p on pa.fk_pedido = p.codigo where p.c_presupuesto = ?',[$codigo]);
        $presupuesto->delete();
        return Redirect::to('cliente/presupuesto');
      }


}
