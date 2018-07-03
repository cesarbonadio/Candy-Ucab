<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use candyucab\Http\Requests;
use candyucab\Presupuesto;
use candyucab\Pedido;
use candyucab\Pago;
use candyucab\Punto_cliente;
use Illuminate\Support\Facades\Redirect;
use candyucab\Http\Requests\PedidoFormRequest;
use DB;


class PedidoController extends Controller {



  public function _construct(){}


        public function index (Request $request) {
          if ($request) {
            $pedidos = DB::select('select p.*,pre.total from pedido p inner join presupuesto pre on p.c_presupuesto = pre.codigo
                                  where pre.fk_tienda is null');
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



         public function pagar_punto ($codigo){
            $cantidad = DB::select('select sum(pc.adquirido*pc.valor) as total, count(pc.codigo) as cantidad
                                    from punto_cliente pc , naturale  n , pedido p, presupuesto pre
                                    where p.codigo = '.$codigo.'
                                    and p.c_presupuesto = pre.codigo
                                    and pre.fk_naturale = n.cedula
                                    and pc.fk_naturale = n.cedula
                                    group by n.cedula

                                    union all

                                    select sum(pc.adquirido*pc.valor) as total, count(pc.codigo) as cantidad
                                    from punto_cliente pc , juridico j , pedido p , presupuesto pre
                                    where p.codigo = '.$codigo.'
                                    and p.c_presupuesto = pre.codigo
                                    and pre.fk_juridico = j.rif
                                    and pc.fk_juridico = j.rif
                                    group by j.rif

                                   ');

            $pedido = Pedido::findOrFail($codigo);
            return view("cliente.pedido.pagar_punto",["cantidad"=>$cantidad,"pedido"=>$pedido]);
         }


         public function encontrar_valor_actual(){
              $punto = DB::select('select codigo,valor FROM `punto` WHERE fecha_fin is null');
              return $punto;
         }



         public function encontrar_cedula_natural($codigoPedido){
          $cedula = DB::select('select n.cedula as id
                                from punto_cliente pc , naturale  n , pedido p, presupuesto pre
                                where p.codigo = '.$codigoPedido.'
                                and p.c_presupuesto = pre.codigo
                                and pre.fk_naturale = n.cedula
                                and pc.fk_naturale = n.cedula
                                group by n.cedula
                              ');
           return $cedula;
         }



         public function encontrar_rif_juridico($codigoPedido){
            $rif = DB::select('select j.rif as id
                              from punto_cliente pc , juridico j , pedido p , presupuesto pre
                              where p.codigo = '.$codigoPedido.'
                              and p.c_presupuesto = pre.codigo
                              and pre.fk_juridico = j.rif
                              and pc.fk_juridico = j.rif
                              group by j.rif
                             ');
           return $rif;
         }


         public function update(PedidoFormRequest $request,$codigo) {

           // con el request valido si se trata de un pago con puntos o no
           if ($request->get('tipo_pago')=='puntos') {

             $Punto_cliente = new Punto_cliente;

             $valor_actual = $this->encontrar_valor_actual();
             $cedula = $this->encontrar_cedula_natural($codigo);
             $rif = $this->encontrar_rif_juridico($codigo);

             if ($cedula[0]->id){
               $Punto_cliente->fk_naturale = $cedula[0]->id;
             }
             else if ($rif[0]->id){
               $Punto_cliente->fk_juridico = $rif[0]->id;
             }

             $Punto_cliente->adquirido = -1*($request->get('monto')/$valor_actual[0]->valor);
             $Punto_cliente->fk_punto = $valor_actual[0]->codigo;
             $Punto_cliente->valor = $valor_actual[0]->valor;

             $Punto_cliente->save();


             $pedido = Pedido::findOrFail($codigo);
             $presupuesto = Presupuesto::findOrFail($pedido->c_presupuesto);
             $presupuesto->total -= $request->get('monto');

             if ($presupuesto->total <= 0){
                $presupuesto->total = 0;
             }
             $pedido->save();
             $presupuesto->save();

           }
           else if ($request->get('tipo_pago')=='medios'){

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
            }

           return Redirect::to('cliente/pedido');
         }



          public function destroy()
          {
           //creo que todavia no hay que eliminar nada (por ahora)
          }
}
