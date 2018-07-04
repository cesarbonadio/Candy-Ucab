<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;
use candyucab\Rol_Privilegio;
use Illuminate\Support\Facades\Redirect;
use candyucab\Http\Requests\PrivilegioFormRequest;
use DB;

class RolPrivilegioController extends Controller
{

  public function _construct(){}

   public function index (Request $request)
   {

       if ($request){
     $query=trim($request ->get('searchText'));
     $rolprivilegio=DB::table('rol_privilegio as rp')
     ->join('rol as r','rp.c_rol','=','r.codigo')
     ->join('privilegio as p', 'p.codigo','=','rp.c_priv')
     ->select('rp.codigo','r.descripcion as rdes','p.descripcion as pdes')
     ->where('rp.codigo','LIKE','%'.$query.'%')
	 ->orderBy('r.descripcion','rp.codigo','asc')
     ->paginate(7);
     return view('gestion.rolprivilegio.index',["rolprivilegio"=>$rolprivilegio,"searchText"=>$query]);
        }
   }

   public function create ()
   {
   		$privilegio=DB::table('privilegio')->get();
   		$rol=DB::table('rol')->get();
      	return view("gestion.rolprivilegio.create",["privilegio"=>$privilegio,"rol"=>$rol]);
   }

   public function store (PrivilegioFormRequest $request)
   {
     $rolprivilegio=new Rol_Privilegio;
     $rolprivilegio->c_rol=$request->get('c_rol');
     $rolprivilegio->c_priv=$request->get('c_priv');
     $rolprivilegio->save();
     return Redirect::to('gestion/rolprivilegio');
   }

   public function show($codigo)
   {
     return view ("gestion.rolprivilegio.show",["rolprivilegio"=>Rol_Privilegio::findOrFail($codigo)]);
   }

    public function edit($codigo)
   {
   		$privilegio=DB::table('privilegio')->get();
   		$rol=DB::table('rol')->get();
       $rolprivilegio=Rol_Privilegio::findOrFail($codigo);
       return view ("gestion.rolprivilegio.edit",["rolprivilegio"=>$rolprivilegio,"privilegio"=>$privilegio,"rol"=>$rol]);
   }

    public function asignar($codigo)
   {
       $rolprivilegio=Rol_Privilegio::findOrFail($codigo);
       return view ("gestion.rolprivilegio.asignar",["rolprivilegio"=>$rolprivilegio]);
   }

    public function update(PrivilegioFormRequest $request,$codigo)
   {
     $rolprivilegio=Rol_Privilegio::findOrFail($codigo);
     $rolprivilegio->c_priv=$request->get('c_priv');
     $rolprivilegio->c_rol=$request->get('c_rol');

     $rolprivilegio->update();
     return Redirect::to('gestion/rolprivilegio');
    }

    public function destroy($codigo)
    {
     $rolprivilegio=Rol_Privilegio::findOrFail($codigo);
     $rolprivilegio->delete();
     return Redirect::to('gestion/rolprivilegio');
    }

}
