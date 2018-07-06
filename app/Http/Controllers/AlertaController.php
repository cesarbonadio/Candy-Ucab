<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use candyucab\Http\Requests;
use DB;

class AlertaController extends Controller
{

        public function _construct(){}


        public function index (Request $request) {

          $alertas=DB::table('inventario as i')
          ->join('tienda as t','t.codigo','=','i.c_tienda')
          ->join('producto as p','p.codigo','=','i.c_producto')
          ->select('i.codigo','i.c_tienda','i.c_producto','i.zona','i.cantidad','p.nombre as nombreproducto','t.nombre as nombretienda')
          ->where('i.cantidad','<=','100')
          ->paginate(7);

          return view('inventario.alerta.index',["alerta"=>$alertas]);
        }

}
