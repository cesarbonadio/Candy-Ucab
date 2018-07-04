<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;
use candyucab\Privilegio;
use Illuminate\Support\Facades\Redirect;
use candyucab\Http\Requests\PrivilegioFormRequest;
use DB;

class PrivilegioController extends Controller
{

  public function _construct(){}

   public function index (Request $request)
   {
       if ($request){
     $query=trim($request ->get('searchText'));
     $privilegio=DB::table('privilegio as p')
     ->select('p.codigo','p.descripcion')
     ->where('p.codigo','LIKE','%'.$query.'%')
     ->orderBy('p.codigo','asc')
     ->paginate(7);
     return view('gestion.privilegio.index',["privilegio"=>$privilegio,"searchText"=>$query]);
        }
   }

   public function create ()
   {
      return view("gestion.privilegio.create");
   }

   public function store (PrivilegioFormRequest $request)
   {
     $privilegio=new Privilegio;
     $privilegio->descripcion=$request->get('descripcion');
     $privilegio->save();
     return Redirect::to('gestion/privilegio');
   }

   public function show($codigo)
   {
     return view ("gestion.privilegio.show",["privilegio"=>Privilegio::findOrFail($codigo)]);
   }

    public function edit($codigo)
   {
       $privilegio=Privilegio::findOrFail($codigo);
       return view ("gestion.privilegio.edit",["privilegio"=>$privilegio]);
   }

    public function update(PrivilegioFormRequest $request,$codigo)
   {
     $privilegio=Privilegio::findOrFail($codigo);
     $privilegio->descripcion=$request->get('descripcion');
     $privilegio->update();
     return Redirect::to('gestion/privilegio');
    }

    public function destroy($codigo)
    {
     $privilegio=Privilegio::findOrFail($codigo);
     DB::delete('delete from rol_privilegio where c_priv = ?',[$codigo]);
     $privilegio->delete();
     return Redirect::to('gestion/privilegio');
    }

}
