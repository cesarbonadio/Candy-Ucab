<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use candyucab\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;

class ReportesController extends Controller
{


          //
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


         /*$retardos = DB::select("select count(a.codigo) as horas
                                   from asistencia as a, horario as h
                                  , ( select sum(time_to_sec(TIME(a.hora_entrada)-TIME(h.hora_inicio))) as retardo
                                        from asistencia as a, horario as h
                                        where a.c_horario = h.clave
                                        and retardo>=3600
                                    )

                                   where a.c_horario = h.clave

                                   group by a.c_empleado
                                   ");*/

           /*$retardos = DB::select('Select a.c_empleado, 21-count(a.codigo) as dias_ausencia
                                   ,sum(TIMESTAMPDIFF(HOUR, hora_inicio, hora_fin) - TIMESTAMPDIFF(HOUR, hora_entrada, hora_salida)) as horas_retraso
                                     from asistencia a inner join horario h on a.c_horario=h.clave
                                     where a.c_horario = 1
                                     group by c_empleado
                                   ');*/

          return view ("reporte.empleado",["empleado"=>$empleados/*,"retardo"=>$retardos*/]);
        }



}