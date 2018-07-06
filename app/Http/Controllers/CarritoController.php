<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use candyucab\Http\Requests;
use candyucab\Presupuesto;
use candyucab\Producto_presupuesto;
use candyucab\Producto;
use candyucab\Pedido;
use candyucab\Pago;
use candyucab\Pedido_estatus;

use candyucab\Punto_cliente;
use Illuminate\Support\Facades\Redirect;
use candyucab\Http\Requests\CarritoFormRequest;
use Carbon\Carbon;

use DB;


class CarritoController extends Controller
{



public function __construct(){/**/}


      public function index(Request $request){
            	  session_start();
      	if (!isset($_SESSION['ini'])){
        	header("Location: /usuario/iniciar"); /* Redirect browser */
        	exit();
    	}
    	else{
    		if($_SESSION['ini']!=1){
    			header("Location: /usuario/iniciar"); /* Redirect browser */
        		exit();
    		}


          if($request){
          $query=trim($request->get('searchText'));
          if($_SESSION['tipo'] == 'juridico'){
          		$presupuesto = DB::select('select pro.foto as foto, pro.nombre as nombre, pp.cantidad as cantidad, pp.precio as precio, p.total as subtotal, p.codigo as codigo from presupuesto p, producto_presupuesto pp, producto pro where pp.c_presupuesto = p.codigo and pp.c_producto = pro.codigo and p.fk_juridico = "'.$_SESSION['datos_usu'].'" and p.fk_tienda is null and NOT EXISTS(select * from pedido pe where pe.c_presupuesto = p.codigo)');;
			}
			else if($_SESSION['tipo'] == 'natural'){
          		 $presupuesto = DB::select('select pro.foto as foto, pro.nombre as nombre, pp.cantidad as cantidad, pp.precio as precio, p.total as subtotal, p.codigo as codigo from presupuesto p, producto_presupuesto pp, producto pro where pp.c_presupuesto = p.codigo and pp.c_producto = pro.codigo and p.fk_naturale = "'.$_SESSION['datos_usu'].'" and p.fk_tienda is null and NOT EXISTS(select * from pedido pe where pe.c_presupuesto = p.codigo)');
			}



          return view('usuario.carrito.carritousu',["presupuesto"=>$presupuesto,"searchText"=>$query]);
          }
      }

      }

	public function indexMetodo(Request $request){
           session_start();


          return view('usuario.pago.metodoDePagoTodo');
      }

      public function indexConfirmacion(Request $request){
      	  session_start();
      	  if(isset($_GET["id"]))
        	{
            	$proId = $_GET["id"];

        	}
          if($request){
          $query=trim($request->get('searchText'));
          $producto=DB::select("select * from producto where codigo = '".$proId."'");



          return view('usuario.addToCart.addToCart',["producto"=>$producto,"searchText"=>$query]);
          }

      }

		public function show($codigo)
        {
          return view ("usuario.carrito.carritousu",["carrito"=>presupuesto::findOrFail($codigo)]);
        }


        public function pagarTodo(CarritoFormRequest $request){
          session_start();
          if($_SESSION['tipo'] == 'juridico'){
              $presupuesto = DB::select('select distinct * from presupuesto p, pedido pe where p.fk_juridico = "'.$_SESSION['datos_usu'].'" and p.fk_tienda is null and p.codigo not in (pe.c_presupuesto)');;
          }  
          else if($_SESSION['tipo'] == 'natural'){
               $presupuesto = DB::select('select * from presupuesto p where p.fk_naturale = "'.$_SESSION['datos_usu'].'" and p.fk_tienda is null');
          }
                    $mytime = Carbon::now();

          foreach ($presupuesto as $pre) {
            $compro = DB::select('select * from pedido where c_presupuesto = "'.$pre->codigo.'"');
            if (!isset($compro[0])){
            $pedido = new Pedido;
            $pedido->fecha = $mytime;
            $pedido->c_presupuesto = $pre->codigo;
            $pedido->save();
            $pago = new Pago;
            $pago->monto = $pre->total;
            $pago->fecha = $mytime;
            $pago->fk_pedido = $pedido->codigo;
            $pago->fk_medio_pago = 2;
            $pago->save();
            $pedido_estatus = new Pedido_estatus;
            $pedido_estatus->cambio=$mytime;
            $pedido_estatus->c_pedido= $pedido->codigo;
            $pedido_estatus->c_estatus= 100;
            $pedido_estatus->save();
          }
          }
          return Redirect::to('usuario/carrito');
      }

      public function pagoParticular(CarritoFormRequest $request){
          session_start();
          if(isset($_GET["codigo"]))
          {
            $codigo = $_GET["codigo"];

          }
            $presupuesto = Presupuesto::findOrFail($codigo);

            $mytime = Carbon::now();

            $compro = DB::select('select * from pedido where c_presupuesto = "'.$codigo.'"');
            if (!isset($compro[0])){
            $pedido = new Pedido;
            $pedido->fecha = $mytime;
            $pedido->c_presupuesto = $presupuesto->codigo;
            $pedido->save();
            $pago = new Pago;
            $pago->monto = $presupuesto->total;
            $pago->fecha = $mytime;
            $pago->fk_pedido = $pedido->codigo;
            $pago->fk_medio_pago = 2;
            $pago->save();
            $pedido_estatus = new Pedido_estatus;
            $pedido_estatus->cambio=$mytime;
            $pedido_estatus->c_pedido= $pedido->codigo;
            $pedido_estatus->c_estatus= 100;
            $pedido_estatus->save();
            
          }
          return Redirect::to('usuario/carrito');
      }


      public function store(CarritoFormRequest $request){
      	  session_start();

      	  $producto = DB::select('select * from producto where codigo = "'.$request->get('producto').'"');
          $presupuesto = new Presupuesto;
          $mytime = Carbon::now();
          $presupuesto->fecha = $mytime;
          $presupuesto->total = ($producto[0]->precio * $request->get('cantidad'));
          if($_SESSION['tipo'] == 'juridico'){
          	$presupuesto->fk_juridico = $_SESSION['datos_usu'];
          }
          else if($_SESSION['tipo'] == 'natural'){
          	$presupuesto->fk_naturale = $_SESSION['datos_usu'];
          }
          $tienda = DB::select('select * from tienda t, inventario i where t.codigo = i.c_tienda and c_producto = "'.$producto[0]->codigo.'" and i.cantidad >= "'.$request->get('cantidad').'"');
          $presupuesto->fk_tienda_compra= $tienda[0]->codigo;
          $presupuesto->fk_usuario= $_SESSION['id'];
          $presupuesto->save();


          $producto_presupuesto = new Producto_presupuesto;
          $producto_presupuesto->cantidad = $request->get('cantidad');
          $producto_presupuesto->precio = $producto[0]->precio;
          $producto_presupuesto->c_presupuesto = $presupuesto->codigo;
          $producto_presupuesto->c_producto = $producto[0]->codigo;
          $producto_presupuesto->save();
          DB::update('update inventario set cantidad = cantidad - "'.$request->get('cantidad').'" where c_tienda = "'.$tienda[0]->codigo.'" and c_producto = "'.$producto[0]->codigo.'"');
          $inventario = DB::select('select * from inventario where c_tienda = "'.$tienda[0]->codigo.'" and c_producto = "'.$producto[0]->codigo.'"');
          if ($inventario[0]->cantidad <= 20){

            $presupuestoTienda= new Presupuesto;
            $presupuestoTienda->fecha = $mytime;
            $presupuestoTienda->fk_tienda = $tienda[0]->codigo;
            $presupuestoTienda->total = $producto[0]->precio * 10000;
            $presupuestoTienda->save();

            $propresuTienda = new Producto_presupuesto;
            $propresuTienda->cantidad = 10000;
            $propresuTienda->precio= $producto[0]->precio;
            $propresuTienda->c_presupuesto = $presupuestoTienda->codigo;
            $propresuTienda->c_producto = $producto[0]->codigo;
            $propresuTienda->save();

            $pedidoTienda = new Pedido;
            $pedidoTienda->fecha = $mytime;
            $pedidoTienda->c_presupuesto = $presupuestoTienda->codigo;
            $pedidoTienda->save();

            $pedidoEstatusTienda= new Pedido_estatus;
            $pedidoEstatusTienda->cambio = $mytime;
            $pedidoEstatusTienda->c_pedido = $pedidoTienda->codigo;
            $pedidoEstatusTienda->c_estatus = 100;
            $pedidoEstatusTienda->save();
          }
          return Redirect::to('usuario/carrito');
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
        $producto_presupuesto = DB::select('select * from producto_presupuesto where c_presupuesto = "'.$codigo.'"');
        $tienda = DB::select('select * from tienda where codigo = "'.$presupuesto->fk_tienda_compra.'"');
        $inventario = DB::select('select * from inventario where c_tienda = "'.$tienda[0]->codigo.'" and c_producto = "'.$producto_presupuesto[0]->c_producto.'"');
        if(($inventario[0]->cantidad + $producto_presupuesto[0]->cantidad) > 20){
          $pro_pre_tienda = DB::select('select pp.* from producto_presupuesto pp, presupuesto p where pp.c_producto = "'.$inventario[0]->c_producto.'" and p.codigo = pp.c_presupuesto and p.fk_tienda = "'.$tienda[0]->codigo.'"');
          $pre_borrar = DB::select('select * from presupuesto where fk_tienda = "'.$tienda[0]->codigo.'" and codigo = "'.$pro_pre_tienda[0]->c_presupuesto.'"');
          $pedido_borrar = DB::select('select * from pedido where c_presupuesto = "'.$pre_borrar[0]->codigo.'"');
          $pedido_estatus_borrar = DB::select('select * from pedido_estatus where c_pedido = "'.$pedido_borrar[0]->codigo.'"');
          DB::delete('delete from pedido_estatus where codigo = "'.$pedido_estatus_borrar[0]->codigo.'"');
          DB::delete('delete from pedido where codigo = "'.$pedido_borrar[0]->codigo.'"');
          DB::delete('delete from producto_presupuesto where codigo = "'.$pro_pre_tienda[0]->codigo.'"');
          DB::delete('delete from Presupuesto where codigo = "'.$pre_borrar[0]->codigo.'"');

        }
        DB::update('update inventario set cantidad = cantidad + "'.$producto_presupuesto[0]->cantidad.'" where c_tienda = "'.$tienda[0]->codigo.'" and c_producto = "'.$producto_presupuesto[0]->c_producto.'"');

        //elimino todos los n a n entre producto y presupuesto
        DB::delete('delete from producto_presupuesto where c_presupuesto = ?',[$codigo]);
        $presupuesto->delete();
        return Redirect::to('usuario/carrito');
      }


}
