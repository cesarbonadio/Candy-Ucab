<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;
use candyucab\diario;
use candyucab\Diario_descuento;
use Illuminate\Support\Facades\Redirect;
use candyucab\Http\Requests\DiarioFormRequest;
use DB;

class DiarioController extends Controller
{
  public function _construct(){}

   public function index (Request $request)
   {
       if ($request){
     $query=trim($request ->get('searchText'));
     $diario=DB::table('diario as d')
     ->select('d.codigo','d.fecha_emision','d.descripcion','d.fecha_vencimiento')
     ->where('d.descripcion','LIKE','%'.$query.'%')
     ->orWhere('d.codigo', 'LIKE','%'.$query.'%')
     ->orderBy('d.codigo','asc')
     ->paginate(7);
     return view('promocion.diario.index',["diario"=>$diario,"searchText"=>$query]);
        }
   }

   public function create ()
   {
      $diario=DB::table('diario')->get();
      return view("promocion.diario.create",["diario"=>$diario]);
   }

   public function store (DiarioFormRequest $request)
   {
   	   		session_start();

     $diario=new diario;
     $diario->descripcion=$request->get('descripcion');
     $diario->fecha_emision=$request->get('fecha_emision');
     $diario->fecha_vencimiento=$request->get('fecha_vencimiento');
     $diario->fk_empleado=$_SESSION['id'];
     $diario->save();
     return Redirect::to('promocion/diario');
   }

   public function show($codigo)
   {
     return view ("promocion.diario.show",["diario"=>diario::findOrFail($codigo)]);
   }

    public function edit($codigo)
   {
       $diario=diario::findOrFail($codigo);
       return view ("promocion.diario.edit",["diario"=>$diario]);
   }

    public function update(DiarioFormRequest $request,$codigo)
   {

     $diario=diario::findOrFail($codigo);
     $diario->descripcion=$request->get('descripcion');
     $diario->fecha_emision=$request->get('fecha_emision');
     $diario->fecha_vencimiento=$request->get('fecha_vencimiento');

     $diario->update();
     return Redirect::to('promocion/diario');
    }

    public function destroy($codigo)
    {
     $diario=diario::findOrFail($codigo);
     DB::delete('delete from diario_descuento where c_diario = ?',[$codigo]);
     $diario->delete();
     return Redirect::to('promocion/diario');
    }

}
//Cambiar todo