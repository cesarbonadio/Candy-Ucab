<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;
use candyucab\Descuento;
use Illuminate\Support\Facades\Redirect;
use candyucab\Http\Requests\DescuentoFormRequest;
use DB;

class DescuentoController extends Controller
{

  public function _construct(){}

   public function index (Request $request)
   {
       if ($request){
     $query=trim($request ->get('searchText'));
     $descuento=DB::table('descuento as d')
     ->join('producto as p','d.fk_producto','=','p.codigo')
     ->select('d.codigo','d.porcentaje','d.descripcion','p.nombre as producto')
     ->where('d.codigo','LIKE','%'.$query.'%')
     ->orderBy('d.codigo','asc')
     ->paginate(7);
     return view('promocion.descuento.index',["descuento"=>$descuento,"searchText"=>$query]);
        }
   }

   public function create ()
   {
      $producto=DB::table('producto')->get();
      return view("promocion.descuento.create",["producto"=>$producto]);
   }

   public function store (DescuentoFormRequest $request)
   {
     $descuento=new Descuento;
     $descuento->porcentaje=$request->get('porcentaje');
     $descuento->descripcion=$request->get('descripcion');
     $descuento->fk_producto=$request->get('fk_producto');
     $descuento->save();
     return Redirect::to('promocion/descuento');
   }

   public function show($codigo)
   {
     return view ("promocion.descuento.show",["descuento"=>Descuento::findOrFail($codigo)]);
   }

    public function edit($codigo)
   {
       $descuento=Descuento::findOrFail($codigo);
       $producto=DB::table('producto')->get();
       return view ("promocion.descuento.edit",["descuento"=>$descuento,"producto"=>$producto]);
   }

    public function update(DescuentoFormRequest $request,$codigo)
   {
     $descuento=Descuento::findOrFail($codigo);
     $descuento->porcentaje=$request->get('porcentaje');
     $descuento->descripcion=$request->get('descripcion');
     $descuento->fk_producto=$request->get('fk_producto');
     $descuento->update();
     return Redirect::to('promocion/descuento');
    }

    public function destroy($codigo)
    {
     $descuento=Descuento::findOrFail($codigo);
     DB::delete('delete from diario_descuento where c_descuento = ?',[$codigo]);
     $descuento->delete();
     return Redirect::to('promocion/descuento');
    }

}
