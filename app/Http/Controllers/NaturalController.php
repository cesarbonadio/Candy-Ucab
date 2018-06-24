<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use candyucab\Http\Requests;
use candyucab\Natural;
use candyucab\Telefono;
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
          ->leftjoin('lugar as l','n.fk_lugar','=','l.codigo')
          ->leftjoin('tienda as t','n.fk_tienda','=','t.codigo')
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
          /*creo el cliente natural*/
          $naturales = new Natural;
          $naturales->cedula=$request->get('cedula');
          $naturales->rif=$request->get('rif');
          $naturales->correo=$request->get('correo');
          $naturales->nombre=$request->get('nombre');
          $naturales->apellido=$request->get('apellido');
          $naturales->fk_lugar=$request->get('fk_lugar');
          $naturales->fk_tienda=$request->get('fk_tienda');
          if ($request->get('fk_tienda')) { //agregando el carnet
           $naturales->num_carnet = $request->get('fk_tienda').'-'.$request->get('cedula');
          }
          $naturales->save();


             if ($request->get('telefono')){ //valida si coloco telefono
                  /*creo el telefono*/
                $telefono = new Telefono;
                $telefono->valor = $request->get('telefono');
                $telefono->tipo = $request->get('tipo_telefono');
                $telefono->fk_naturale = $request->get('cedula');
                $telefono->save();
             }

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
          $naturales->nombre=$request->get('nombre');
          $naturales->apellido=$request->get('apellido');
          $naturales->fk_lugar=$request->get('fk_lugar');
          if ($request->get('fk_tienda')) { //agregando el carnet
           $naturales->fk_tienda=$request->get('fk_tienda');
           $naturales->num_carnet = $request->get('fk_tienda').'-'.$request->get('cedula');
          }

          $naturales->update();


              if ($request->get('telefono')){//valida si coloco telefono
                /*creo el telefono*/
                $telefono = new Telefono;
                $telefono->valor = $request->get('telefono');
                $telefono->tipo = $request->get('tipo_telefono');
                $telefono->fk_naturale = $request->get('cedula');
                $telefono->save();
              }

          return Redirect::to('cliente/natural');
         }



          public function destroy($cedula)
          {
          $naturales=Natural::findOrFail($cedula);
          DB::delete('delete from telefono where fk_naturale = ?',[$cedula]);
          DB::delete('delete from usuario where fk_naturale = ?',[$cedula]);
          $naturales->delete();
          return Redirect::to('cliente/natural');
          }

}
