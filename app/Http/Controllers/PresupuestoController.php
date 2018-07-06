<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use candyucab\Http\Requests;
use candyucab\Presupuesto;
use candyucab\Producto_presupuesto;
use candyucab\Producto;
use candyucab\Pedido;
use candyucab\Punto_cliente;
use candyucab\Inventario;
use candyucab\Pedido_estatus;
use Illuminate\Support\Facades\Redirect;
use candyucab\Http\Requests\PresupuestoFormRequest;
use DB;


class PresupuestoController extends Controller
{



public function __construct(){/**/}


      public function index(Request $request){

          if($request){
          $query=trim($request->get('searchText'));
          $presupuestos = DB::table('presupuesto as p')

          ->leftjoin('juridico as j','p.fk_juridico','=','j.rif')
          ->leftjoin('naturale as n','p.fk_naturale','=','n.cedula')
          ->leftjoin('tienda as t','p.fk_tienda',"=",'t.codigo')
          ->leftjoin('tienda as tcompra','p.fk_tienda_compra','=','tcompra.codigo')
          ->leftjoin('usuario as u','p.fk_usuario','=','u.id')

          ->select('p.codigo','p.total','p.fecha','j.rif as rif','n.cedula as cedula','t.nombre as tienda','tcompra.nombre as tienda_compra','u.id as usuario')
          ->where('p.codigo','LIKE','%'.$query.'%')
          ->whereNull('p.fk_tienda')
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


      public function encontrar_valor_actual(){
           $punto = DB::select('select codigo,valor FROM `punto` WHERE fecha_fin is null');
           return $punto;
      }



      public function descontar_tienda($codigoTienda,$codigoProducto,$cantidadDescontar){
        DB::update('update inventario set cantidad = cantidad - ?
                    where c_tienda = ? and c_producto = ?',
                    [$cantidadDescontar,$codigoTienda,$codigoProducto]);
      }



      public function obtener_inventario($codigoTienda,$codigoProducto){
        $inventario = DB::select('select cantidad from inventario
                                  where c_tienda = ?
                                  and c_producto = ?',[$codigoTienda,$codigoProducto]);
        return $inventario[0]->cantidad;
      }




      public function existe_reposicion_pendiente($codigoTienda,$codigoProducto){

        $pendiente = DB::select('select p.codigo, pro.codigo from
                                pedido p, presupuesto pre, producto pro, producto_presupuesto pp, pedido_estatus ps
                                where pre.fk_tienda = ?
                                and p.c_presupuesto = pre.codigo
                                and pp.c_producto = ?
                                and pp.c_presupuesto = pre.codigo
                                and ps.c_pedido = p.codigo
                                and ps.c_estatus != 400
                                and ps.c_estatus = 100
                                group by p.codigo
                                ',[$codigoTienda,$codigoProducto]);

        if (empty($pediente[0])) return false;
        else return true;
      }




      public function reponer_inventario($codigoTienda,$codigoProducto){
        $presupuesto = new Presupuesto;
        $presupuesto->fecha = date('Y-m-d H:i:s');
        $presupuesto->fk_tienda = $codigoTienda;
        $presupuesto->save();

        $producto = Producto::findOrFail($codigoProducto);
        $producto_presupuesto = new Producto_presupuesto;
        $producto_presupuesto->cantidad = 10000;
        $producto_presupuesto->precio = $producto->precio;
        $producto_presupuesto->c_producto = $producto->codigo;
        $producto_presupuesto->c_presupuesto = $presupuesto->codigo;
        $producto_presupuesto->save();

        $presupuesto->total = 10000 * $producto->precio;
        $presupuesto->save();

        $pedido = new Pedido;
        $pedido->fecha = date('Y-m-d H:i:s');
        $pedido->c_presupuesto = $presupuesto->codigo;
        $pedido->save();

        $pedido_estatus = new Pedido_estatus;
        $pedido_estatus->c_estatus = 100;
        $pedido_estatus->c_pedido = $pedido->codigo;
        $pedido_estatus->cambio = date('Y-m-d H:i:s');
        $pedido_estatus->save();
      }



      public function store(PresupuestoFormRequest $request){
          $presupuesto = new Presupuesto;
          $presupuesto->fecha = date('Y-m-d H:i:s');
          $presupuesto->fk_naturale = $request->get('fk_naturale');
          $presupuesto->fk_juridico = $request->get('fk_juridico');

          //guardo que el cliente se gano un punto con la compra fisica (cuando pide un presupuesto)
          $arreglo_punto = $this->encontrar_valor_actual();
          $punto_cliente = new Punto_cliente;
          $punto_cliente->adquirido = 1;
          $punto_cliente->fk_punto = $arreglo_punto[0]->codigo;
          $punto_cliente->valor = $arreglo_punto[0]->valor;
          if ($request->get('fk_naturale')) $punto_cliente->fk_naturale = $request->get('fk_naturale');
          else if ($request->get('fk_juridico')) $punto_cliente->fk_juridico = $request->get('fk_juridico');
          $punto_cliente->save();


          $presupuesto->fk_tienda_compra = $request->get('fk_tienda_compra');
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

              //descontar de tiendas
              $this->descontar_tienda($request->get('fk_tienda_compra'),$producto->codigo,$request->get('cantidad'.$i));

              //reponer inventario
              $inventario = $this->obtener_inventario($request->get('fk_tienda_compra'),$producto->codigo);
              $pendiente = $this->existe_reposicion_pendiente($request->get('fk_tienda_compra'),$producto->codigo);

               if (($inventario <= 20)){
                 $this->reponer_inventario($request->get('fk_tienda_compra'),$producto->codigo);
               }

              $acumulado = $acumulado + ($producto->precio*$producto_presupuesto->cantidad);
            }
            else break;
          }

          //cuando el presupuesto se genera en fisico, el pedido se genera directamente
          $pedido = new Pedido;
          $pedido->fecha = date('Y-m-d H:i:s');
          $pedido->c_presupuesto = $presupuesto->codigo;
          $pedido->save();

          $punto_cliente->fk_pedido = $pedido->codigo;
          $punto_cliente->save();

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

              //descontar de tiendas
              $this->descontar_tienda($presupuesto->fk_tienda_compra,$producto->codigo,$request->get('cantidad'.$i));
              $pendiente = $this->existe_reposicion_pendiente($presupuesto->fk_tienda,$producto->codigo);

              //reponer inventario
              $inventario = $this->obtener_inventario($presupuesto->fk_tienda_compra,$producto->codigo);
               if (($inventario <= 20)){
                 $this->reponer_inventario($presupuesto->fk_tienda_compra,$producto->codigo);
               }

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
