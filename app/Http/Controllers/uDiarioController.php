<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use candyucab\diario;
use Illuminate\Support\Facades\Redirect;
use candyucab\Http\Requests\DescuentoFormRequest;
use Carbon\Carbon;
use DB;

class uDiarioController extends Controller
{

  public function _construct(){}

   public function index (Request $request)
   {
        if ($request){
          $query=trim($request ->get('searchText'));
          $mytime = Carbon::now();
          $cont = 0;
          $diario=DB::select('Select * from diario where fecha_emision <"'.$mytime.'" and "'.$mytime.'" < fecha_vencimiento');
          if(!empty($diario)){
            $descuento=DB::select('Select * from descuento d, diario_descuento dd where d.codigo = dd.c_descuento and dd.c_diario = "'.$diario[0]->codigo.'"');
            $producto=DB::select('Select * from producto p, diario d, descuento de, diario_descuento dd where p.codigo = de.fk_producto and dd.c_diario ="'.$diario[0]->codigo.'" and de.codigo = dd.c_descuento');//En vista que solo son dos productos por eso se crean dos variables
                   //     $producto=DB::select('Select * from producto p where p.codigo ="'.$descuento[0]->fk_producto.'" union Select * from producto p where p.codigo ="'.$descuento[1]->fk_producto.'"');//En vista que solo son dos productos por eso se crean dos variables

            return view('usuario.diario.diar',["diario"=>$diario,"descuento"=>$descuento, "producto"=>$producto, "cont"=>$cont]);
          }
          else {
            $diario=DB::select('Select * from diario where fecha_emision >"'.$mytime.'"');
            return view('usuario.diario.nodiar',["diario"=>$diario]);
          }
        }
   }

   public function create ()
   {

   }

   public function store (DescuentoFormRequest $request)
   {

   }

   public function show($codigo)
   {
     return view ("usuario.diario.diar",["descuento"=>Descuento::findOrFail($codigo)]);
   }

    public function edit($codigo)
   {

   }

    public function update(DescuentoFormRequest $request,$codigo)
   {
    }

    public function destroy($codigo)
    {
    }

}
