<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;
use candyucab\Diario_descuento;
use Illuminate\Support\Facades\Redirect;
use candyucab\Http\Requests\Diario_DescuentoFormRequest;
use DB;

class Diario_DescuentoController extends Controller
{
  public function _construct(){}

   public function index (Request $request)
   {
       if ($request){
     $query=trim($request ->get('searchText'));
     $diario_descuento=DB::table('diario_descuento as dd')
     ->join('diario as d','dd.c_diario','=','d.codigo')
     ->join('descuento as de','dd.c_descuento','=','de.codigo')
     ->select('dd.codigo','dd.c_diario','dd.c_descuento','de.descripcion as dedes','d.descripcion as ddes')
     ->where('dd.codigo','LIKE','%'.$query.'%')
     ->orderBy('dd.codigo','asc')
     ->paginate(10);

     return view('promocion.diario_descuento.index',["diario_descuento"=>$diario_descuento,"searchText"=>$query]);
        }
   }

   public function create ()
   {
      $diario_descuento=DB::table('diario_descuento')->get();
      return view("promocion.diario_descuento.create",["diario_descuento"=>$diario_descuento]);
   }

   public function store (Diario_DescuentoFormRequest $request)
   {

     $diario_descuento=new diario_descuento;
     $diario_descuento->c_diario=$request->get('c_diario');
     $diario_descuento->c_descuento=$request->get('c_descuento');
     $diario_descuento->save();
     return Redirect::to('promocion/diario_descuento');
   }

   public function show($codigo)
   {
     return view ("promocion.diario_descuento.show",["diario_descuento"=>diario_descuento::findOrFail($codigo)]);
   }

    public function edit($codigo)
   {
       $diario_descuento=diario_descuento::findOrFail($codigo);
       return view ("promocion.diario_descuento.edit",["diario_descuento"=>$diario_descuento]);
   }

    public function update(Diario_DescuentoFormRequest $request,$codigo)
   {

     $diario_descuento=diario_descuento::findOrFail($codigo);
     $diario_descuento->c_diario=$request->get('c_diario');
     $diario_descuento->c_descuento=$request->get('c_descuento');
     $diario_descuento->update();
     
     return Redirect::to('promocion/diario_descuento');
    }

    public function destroy($codigo)
    {
     $diario_descuento=diario_descuento::findOrFail($codigo);
     $diario_descuento->delete();
     return Redirect::to('promocion/diario_descuento');
    }

}
//Cambiar todo