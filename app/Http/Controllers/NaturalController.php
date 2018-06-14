<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use candyucab\Http\Requests;
use candyucab\Natural;
use Illuminate\Support\Facades\Redirect;
use candyucab\Http\Requests\NaturalFormRequest;
use DB;


class NaturalController extends Controller
{

  public function _construct(){}


        public function index (Request $request)
        {
          if ($request){
          $query=trim($request ->get('searchText'));
          $naturales=DB::table('naturale as n')
          ->join('lugar as l','n.fk_lugar','=','l.codigo')
          ->join('tienda as t','n.fk_tienda','=','t.codigo')
          ->select('n.cedula','n.rif','n.correo','n.num_carnet','n.nombre','n.apellido','l.nombre as lugar','t.nombre as tienda')
          ->where('n.cedula','LIKE','%'.$query.'%')
          ->orwhere('n.nombre','LIKE','%'.$query.'%')
          ->orderBy('n.cedula','desc')
          ->paginate(7);
          return view('cliente.natural.index',["naturale"=>$naturales,"searchText"=>$query]);
           }
        }

        public function create ()
        {
             $lugar=DB::table('lugar')->get();
             $tienda=DB::table('tienda')->get();
             return view("cliente.natural.create",["lugar"=>$lugar,"tienda"=>$tienda]);
        }

        public function store(NaturalFormRequest $request)
        {
          $naturales=new Natural;
          $naturales->cedula=$request->get('cedula');
          $naturales->rif=$request->get('rif');
          $naturales->num_carnet=$request->get('num_carnet');
          $naturales->correo=$request->get('correo');
          $naturales->nombre=$request->get('nombre');
          $naturales->apellido=$request->get('apellido');
          $naturales->fk_lugar=$request->get('fk_lugar');
          $naturales->fk_tienda=$request->get('fk_tienda');
          $naturales->save();
          return Redirect::to('cliente/natural');
        }

        public function show($cedula)
        {
          return view ("cliente.natural.show",["naturale"=>Naturales::findOrFail($cedula)]);
        }

         public function edit($cedula)
        {
            $naturales=Natural::findOrFail($cedula);
            $lugar=DB::table('lugar')->get();
            $tienda=DB::table('tienda')->get();
          return view ("cliente.natural.edit",["naturale"=>$naturales,"lugar"=>$lugar,"tienda"=>$tienda]);
        }

         public function update(NaturalFormRequest $request,$cedula)
         {
          $naturales=Natural::findOrFail($cedula);
          $naturales->cedula=$request->get('cedula');
          $naturales->rif=$request->get('rif');
          $naturales->correo=$request->get('correo');
          $naturales->num_carnet=$request->get('num_carnet');
          $naturales->nombre=$request->get('nombre');
          $naturales->apellido=$request->get('apellido');
          $naturales->fk_lugar=$request->get('fk_lugar');
          $naturales->fk_tienda=$request->get('fk_tienda');
          $naturales->update();
          return Redirect::to('cliente/natural');
         }

          public function destroy($cedula)
          {
          $naturales=Natural::findOrFail($cedula);
          $naturales->delete();
          return Redirect::to('cliente/natural');
          }
}
