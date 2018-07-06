<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use candyucab\Http\Requests;
use candyucab\Pedido;
use candyucab\Estatus;
use candyucab\Pedido_estatus;
use Illuminate\Support\Facades\Redirect;
use candyucab\Http\Requests\ReposicionFormRequest;
use DB;



class ReposicionController extends Controller
{



  public function _construct(){}

        public function index (Request $request) {
          if ($request) {



            $pedidos = DB::select('select p.*,pre.total, e.descripcion
                                   from pedido p , presupuesto pre, estatus e, pedido_estatus ps
                                   where p.c_presupuesto = pre.codigo
                                   and ps.c_pedido = p.codigo
                                   and ps.c_estatus = e.codigo
                                   and pre.fk_tienda is not null
                                   order by ps.cambio desc
                                   ');
            return view('inventario.reposicion.index',["pedido"=>$pedidos]);
           }
        }


         public function edit($codigo) {
            $pedido = Pedido::findOrFail($codigo);
            $estatus = DB::table('estatus')->get();
            return view("inventario.reposicion.edit",["pedido"=>$pedido,"estatus"=>$estatus]);
         }


         public function reponer_por_pedido($codigoPedido){

            $pedido = DB::select(' select pro.codigo codigo_producto , t.codigo codigo_tienda
                                   from pedido_estatus ps, pedido p, presupuesto pre, producto_presupuesto pp, tienda t, producto pro
                                   where ps.c_estatus = 400
                                   and ps.c_pedido = p.codigo
                                   and p.c_presupuesto = pre.codigo
                                   and pp.c_presupuesto = pre.codigo
                                   and pre.fk_tienda = t.codigo
                                   and pp.c_producto = pro.codigo
                                   and p.codigo = ?
                                   ',[$codigoPedido]);

            DB::update('update inventario set cantidad = cantidad + 10000 where c_producto = ? and c_tienda = ?',[$pedido[0]->codigo_producto,$pedido[0]->codigo_tienda]);
         }



         public function update(ReposicionFormRequest $request,$codigo) {
           $pedido_estatus = new Pedido_estatus;
           $pedido_estatus->cambio = date('Y-m-d H:i:s');
           $pedido_estatus->c_pedido = $codigo;
           $pedido_estatus->c_estatus = $request->get('c_estatus');
           $pedido_estatus->save();

           if ($request->get('c_estatus')==400){
                $this->reponer_por_pedido($codigo);
           }

           return Redirect::to('inventario/reposicion');
         }

          public function destroy()
          {
           //creo que todavia no hay que eliminar nada (por ahora)
          }
}
