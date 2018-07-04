<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;
use candyucab\Rol;
use Illuminate\Support\Facades\Redirect;
use candyucab\Http\Requests\PrivilegioFormRequest;
use DB;

class RolController extends Controller
{

  public function _construct(){}

   public function index (Request $request)
   {
       if ($request){
     $query=trim($request ->get('searchText'));
     $rol=DB::table('rol as r')
     ->select('r.codigo','r.descripcion')
     ->where('r.codigo','LIKE','%'.$query.'%')
     ->orderBy('r.codigo','asc')
     ->paginate(7);
     return view('gestion.rol.index',["rol"=>$rol,"searchText"=>$query]);
        }
   }

   public function create ()
   {
      return view("gestion.rol.create");
   }

   public function store (PrivilegioFormRequest $request)
   {
     $rol=new Rol;
     $rol->descripcion=$request->get('descripcion');
     $rol->save();
     return Redirect::to('gestion/rol');
   }

   public function show($codigo)
   {
     return view ("gestion.rol.show",["rol"=>Rol::findOrFail($codigo)]);
   }

    public function edit($codigo)
   {
       $rol=Rol::findOrFail($codigo);
       return view ("gestion.rol.edit",["rol"=>$rol]);
   }

    public function asignar($codigo)
   {
       $rol=Rol::findOrFail($codigo);
       return view ("gestion.rol.asignar",["rol"=>$rol]);
   }

    public function update(PrivilegioFormRequest $request,$codigo)
   {
     $rol=Rol::findOrFail($codigo);
     $rol->descripcion=$request->get('descripcion');
     $rol->update();
     return Redirect::to('gestion/rol');
    }

    public function destroy($codigo)
    {
     $rol=Rol::findOrFail($codigo);
     DB::delete('delete from rol_privilegio where c_rol = ?',[$codigo]);
     $rol->delete();
     return Redirect::to('gestion/rol');
    }

}
