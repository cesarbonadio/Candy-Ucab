<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use candyucab\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;

class ReportesController extends Controller
{


        public function __construct(){

        }





        public function top_cliente_punto() {

          $clientes = DB::select('select n.cedula as id, sum(p.adquirido) as suma, n.nombre as nombre
                                  from punto_cliente as p, naturale as n
                                  where p.fk_naturale = n.cedula
                                  group by n.cedula, n.nombre

                                  union

                                  select j.rif as id, sum(p.adquirido) as suma, j.d_social as nombre
                                  from punto_cliente as p, juridico as j
                                  where p.fk_juridico = j.rif
                                  group by j.rif, j.d_social

                                  order by suma desc
                                  ');

          return view ("reporte.top10punto",["cliente"=>$clientes]);
        }






        public function asistencia_empleados() {

          $asistencias = DB::select('select a.hora_entrada,a.hora_salida, e.cedula, e.nombre, e.apellido, e.cargo
                                     from asistencia as a, empleado as e
                                     where a.c_empleado = e.cedula
                                   ');

          return view ("reporte.asistencia",["asistencia"=>$asistencias]);
        }






        public function ingrediente_productos(){

          $ingrediente = DB::select('select t.codigo,t.descripcion, count(p.codigo) as veces_usado
                                     from producto p, tipo t
                                     where p.fk_tipo = t.codigo
                                     group by p.fk_tipo,t.codigo,t.descripcion
                                     order by count(p.codigo) desc
                                    ');

          return view ("reporte.ingrediente",["ingrediente"=>$ingrediente]);

        }






        public function tarjeta_credito(){

          $tarjeta = DB::select('select m.marca_tarjeta as marca, count(m.marca_tarjeta) as veces_registrada
                                     from medio_pago m
                                     group by m.marca_tarjeta
                                     order by count(m.marca_tarjeta) desc
                                    ');

          return view ("reporte.tarjeta",["tarjeta"=>$tarjeta]);

        }






        public function factura(){

          $facturas = DB::select('select sum(p.monto) as suma, p.fk_pedido as pedido, n.cedula as idcliente , n.nombre as nombre, n.apellido as apellido, pe.fecha as fecha_pedido
                                  from pago p, pedido pe , presupuesto pre, naturale n
                                  where pe.codigo = p.fk_pedido
                                  and pe.c_presupuesto = pre.codigo
                                  and pre.fk_naturale = n.cedula
                                  group by p.fk_pedido,n.cedula, n.nombre, n.apellido , pe.fecha

                                  union

                                  select sum(p.monto) as suma, p.fk_pedido as pedido, j.rif as idcliente , j.d_social as nombre, j.r_social as apellido, pe.fecha as fecha_pedido
                                  from pago p, pedido pe , presupuesto pre, juridico j
                                  where pe.codigo = p.fk_pedido
                                  and pe.c_presupuesto = pre.codigo
                                  and pre.fk_juridico = j.rif
                                  group by p.fk_pedido,j.rif, j.d_social, j.r_social , pe.fecha

                                  ');

          return view ("reporte.factura",["factura"=>$facturas]);

        }



        public function tienda_ingresos_egresos(){

          $ingresos = DB::select('select t.codigo, t.nombre, sum(p.total) as total
                                 from tienda t, presupuesto p
                                 where p.fk_tienda = t.codigo
                                 group by t.codigo, t.nombre

                                 ');

          $egresos = DB::select('select t.codigo, t.nombre, sum(p.total) as total
                                from tienda t, presupuesto p
                                where p.fk_tienda_compra = t.codigo
                                group by t.codigo, t.nombre
                                ');

          return view ("reporte.tienda_ingresos_egresos",["ingreso"=>$ingresos,"egreso"=>$egresos]);

        }



        public function top_producto_tienda(){

          $productos = DB::select('select max(x.total) as cantidad_vendida ,  x.tienda_nombre, x.nombre_producto

                                    from (SELECT pro.nombre as nombre_producto, sum(propre.cantidad) as total, t.nombre as tienda_nombre
                                    FROM producto_presupuesto propre, producto pro, presupuesto pre, tienda t where propre.c_producto = pro.codigo
                                    and pre.codigo = propre.c_presupuesto
                                    and pre.fk_tienda_compra = t.codigo
                                    group by t.nombre,propre.c_producto,pro.nombre
                                    order by sum(propre.cantidad) desc) x

                                    group by x.tienda_nombre
                                   ');

          return view ("reporte.top_producto_tienda",["producto"=>$productos]);
        }



        public function top_retraso_estatus(){

          $estatus = DB::select(' select count(ps.codigo) as total, ps.c_estatus, e.descripcion
                                  from pedido_estatus as ps, estatus as e
                                  where ps.c_estatus = e.codigo
                                  group by ps.c_estatus
                                  order by count(ps.codigo) desc
                                  limit 1
                                   ');

          return view ("reporte.top_retraso_estatus",["estatus"=>$estatus]);
        }




        public function empleados() {

          $empleados = DB::select('select sum(TIMESTAMPDIFF(HOUR, hora_entrada, hora_salida)) as horas
                                    , sec_to_time(avg(time_to_sec(a.hora_entrada))) as promedio
                                    , sec_to_time(avg(time_to_sec(a.hora_salida))) as promedioS
                                    , e.cedula as cedula
                                    , e.nombre as nombre


                                     from asistencia as a, empleado as e
                                     where a.c_empleado = e.cedula
                                     group by a.c_empleado,e.cedula,e.nombre
                                   ');

          return view ("reporte.empleado",["empleado"=>$empleados]);
        }


       public function metodo(){


          $metodo = DB::select('select m.tipo as tipo, count(p.fk_medio_pago) as veces_usado
                                     from medio_pago m, pago p
                                     where p.fk_medio_pago = m.codigo
                                     group by m.tipo
                                     order by count(p.fk_medio_pago) desc
                               ');

          return view ("reporte.metodo",["metodo"=>$metodo]);

        }
        public function productoGeneral(){

          $productoGeneral  = DB::select('select p.nombre as pronombre, sum(pp.cantidad) as veces_comprado
                                     from producto p, producto_presupuesto pp
                                     where pp.c_producto = p.codigo
                                     group by p.nombre
                                     order by sum(pp.cantidad) desc
                                    ');

          return view ("reporte.productoGeneral",["productoGeneral"=>$productoGeneral]);

        }

        public function productoPorTienda(){

          $productoPorTienda  = DB::select('select p.nombre as pronombre, sum(pp.cantidad) as veces_comprado, t.nombre as tnombre
                                     from producto p, producto_presupuesto pp, tienda t, presupuesto pr
                                     where pp.c_producto = p.codigo and pp.c_presupuesto = pr.codigo and pr.fk_tienda_compra = t.codigo
                                     group by t.nombre, p.nombre
                                     order by sum(pp.cantidad) desc
                                    ');

          return view ("reporte.productoPorTienda",["productoPorTienda"=>$productoPorTienda]);

        }

        public function top5Clientespr(){

          return view ("reporte.top5Clientesprev");

        }
        public function top5Clientes(){

          /*$top5Clientes  = DB::select('select p.*, sum(p.total) as totale, n.nombre as nombre from presupuesto p, naturale as n where p.fk_tienda is null and n.cedula = p.fk_naturale
          union select pp.*, sum(pp.total) as totale, j.d_social as nombre from presupuesto pp, juridico as j where pp.fk_tienda is null and j.rif = pp.fk_juridico order by totale
            ');
*/
            if(isset($_GET["fechaini"]))
        {
            $fechaini = $_GET["fechaini"];
            $fechafin = $_GET["fechafin"];

        }
            $variable = DB::select('select sum(pre.total) as suma, n.cedula as idcliente , n.nombre as nombre, n.apellido as apellido
        from presupuesto pre, naturale n
        where
         pre.fk_naturale = n.cedula
         group by n.cedula

          union

         select sum(pre.total) as suma, j.rif as idcliente , j.d_social as nombre, j.r_social as apellido
         from presupuesto pre, juridico j
          where 
           pre.fk_juridico = j.rif 
           and pre.fecha between "'.$fechaini.'" and "'.$fechafin.'"
         group by j.rif

           order by suma desc limit 5');
          return view ("reporte.top5Clientes",["top5Clientes"=>$variable]);

        }


        public function balance_puntos_tienda_lugar(){

          $otorgados  = DB::select('select t.nombre as nombre_tienda , sum(pc.adquirido) as otorgado, l.nombre as nombre_lugar
                                        from tienda as t, punto_cliente pc, pedido p, presupuesto pre, lugar l
                                        where pc.fk_pedido = p.codigo
                                        and p.c_presupuesto = pre.codigo
                                        and pre.fk_tienda_compra = t.codigo
                                        and pc.adquirido > 0.00
                                        and t.fk_lugar = l.codigo
                                        group by t.codigo
                                    ');

          $canjeados =   DB::select('select t.nombre as nombre_tienda , -1*(sum(pc.adquirido)) as canjeados, l.nombre as nombre_lugar
                                        from tienda as t, punto_cliente pc, pedido p, presupuesto pre, lugar l
                                        where pc.fk_pedido = p.codigo
                                        and p.c_presupuesto = pre.codigo
                                        and pre.fk_tienda_compra = t.codigo
                                        and pc.adquirido < 0.00
                                        and t.fk_lugar = l.codigo
                                        group by t.codigo
                                    ');

          return view ("reporte.balance_puntos_tienda_lugar",["otorgados"=>$otorgados,"canjeados"=>$canjeados]);

        }

        public function tienda_pago_puntos(){

          $tiendas  = DB::select('select t.nombre as nombre_tienda , -1*(sum(pc.adquirido)) as canjeados
                                     from tienda as t, punto_cliente pc, pedido p, presupuesto pre, lugar  l
                                        where pc.fk_pedido = p.codigo
                                        and p.c_presupuesto = pre.codigo
                                        and pre.fk_tienda_compra = t.codigo
                                        and pc.adquirido < 0.00
                                        and t.fk_lugar = l.codigo
                                        group by t.codigo
                                        order by -1*(sum(pc.adquirido)) desc
                                    ');

          return view ("reporte.tienda_pago_puntos",["tienda"=>$tiendas]);

        }


        public function ranking_producto_tienda_lugar(){

          $tienda = DB::select('select max(x.total) as cantidad_vendida ,  x.tienda_nombre, x.nombre_producto

                                    from (SELECT pro.nombre as nombre_producto, sum(propre.cantidad) as total, t.nombre as tienda_nombre
                                    FROM producto_presupuesto propre, producto pro, presupuesto pre, tienda t where propre.c_producto = pro.codigo
                                    and pre.codigo = propre.c_presupuesto
                                    and pre.fk_tienda_compra = t.codigo
                                    group by t.nombre,propre.c_producto,pro.nombre
                                    order by sum(propre.cantidad) desc) x

                                    group by x.tienda_nombre
                                    order by max(x.total) desc');

          $lugar = DB::select('select max(x.total) as cantidad_vendida , x.nombre_producto, x.lugar_nombre, x.lugar_codigo

                                from (SELECT pro.nombre as nombre_producto, sum(propre.cantidad) as total, l.nombre as lugar_nombre, l.codigo as lugar_codigo
                                FROM producto_presupuesto propre, producto pro, presupuesto pre, tienda t, lugar as l
                                where propre.c_producto = pro.codigo
                                and pre.codigo = propre.c_presupuesto
                                and pre.fk_tienda_compra = t.codigo
                                and t.fk_lugar = l.codigo
                                group by l.codigo,propre.c_producto,pro.nombre
                                order by sum(propre.cantidad) desc) x

                                group by x.lugar_codigo
                                order by max(x.total) desc');


          return view ("reporte.ranking_producto_tienda_lugar",["tienda"=>$tienda,"lugar"=>$lugar]);
        }



       public function top_cliente_compra() {

          $clientes = DB::select('select n.cedula as id, count(p.codigo) as suma, n.nombre as nombre
                                  from presupuesto as p, naturale as n
                                  where p.fk_naturale = n.cedula
                                  group by n.cedula, n.nombre

                                  union

                                  select j.rif as id, count(p.codigo) as suma, j.d_social as nombre
                                  from presupuesto as p, juridico as j
                                  where p.fk_juridico = j.rif
                                  group by j.rif, j.d_social

                                  order by suma desc
                                  limit 10
                                  ');

          return view ("reporte.top10compra",["cliente"=>$clientes]);
        }



        public function top_cliente_frecuente(Request $request) {

          if ($request){
          $query=trim($request ->get('searchText'));
          $clientes=DB::select('select n.cedula as id, count(p.codigo) as compra, n.nombre as nombre, t.nombre as tienda
                                  from presupuesto as p, naturale as n, tienda as t
                                  where p.fk_naturale = n.cedula and p.fk_tienda_compra=t.codigo and fecha<"'.$query.'"
                                  group by t.nombre,n.cedula

                                  union

                                  select j.rif as id, count(p.codigo) as compra, j.d_social as nombre, t.nombre as tienda
                                  from presupuesto as p, juridico as j, tienda as t
                                  where p.fk_juridico = j.rif and p.fk_tienda_compra=t.codigo and fecha<"'.$query.'"
                                  group by t.nombre ,j.rif

                                  order by compra desc
                                  limit 10

                                  ');

                  }

          return view ("reporte.clientes_frecuentes",["cliente"=>$clientes,"searchText"=>$query]);
        
}



}
