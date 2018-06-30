<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use candyucab\Http\Requests;
use candyucab\Presupuesto;
use candyucab\Pedido;
use candyucab\Pago;
use Illuminate\Support\Facades\Redirect;
use candyucab\Http\Requests\PedidoFormRequest;
use DB;


class PedidoController extends Controller {


  public function _construct(){}

        public function index (Request $request) {
          if ($request) {
            $pedidos = DB::select('select p.*,pre.total from pedido p inner join presupuesto pre on p.c_presupuesto = pre.codigo');
            return view('cliente.pedido.index',["pedido"=>$pedidos]);
           }
        }


         public function edit($codigo) {
            $medios_pago = DB::select('select m.*
                                       from medio_pago as m, presupuesto as pre, pedido as p, naturale as n
                                       where p.c_presupuesto = pre.codigo
                                       and pre.fk_naturale = n.cedula
                                       and n.cedula = m.fk_naturale
                                       and p.codigo = '.$codigo.

                                       ' union

                                        select m.*
                                        from medio_pago as m, presupuesto as pre, pedido as p, juridico as j
                                        where p.c_presupuesto = pre.codigo
                                        and pre.fk_juridico = j.rif
                                        and j.rif = m.fk_juridico
                                        and p.codigo = '.$codigo
                                     );

            $pedido = Pedido::findOrFail($codigo);
            return view("cliente.pedido.edit",["medio"=>$medios_pago,"pedido"=>$pedido]);
         }



         public function update(PedidoFormRequest $request,$codigo) {
           $pago = new Pago;
           $pago->monto = $request->get('monto');
           $pago->fecha = date('Y-m-d H:i:s');
           $pago->fk_pedido = $codigo;
           $pago->fk_medio_pago = $request->get('fk_medio_pago');
           $pago->save();

           $pedido = Pedido::findOrFail($codigo);
           $presupuesto = Presupuesto::findOrFail($pedido->c_presupuesto);

           $presupuesto->total -= $request->get('monto');

           if ($presupuesto->total <= 0){
              $presupuesto->total = 0;
           }

           $pedido->save();
           $presupuesto->save();
           return Redirect::to('cliente/pedido');
         }


          public function destroy()
          {
           //creo que todavia no hay que eliminar nada (por ahora)
          }
}
