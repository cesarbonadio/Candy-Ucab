<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;

use candyucab\Http\Requests;
use candyucab\Contacto;
use Illuminate\Support\Facades\Redirect;
use candyucab\Http\Requests\ContactoFormRequest;
use DB;

class ContactoController extends Controller
{


  public function _construct(){}


    public function index (Request $request) {
        if ($request){
          $query=trim($request ->get('searchText'));
          $contactos=DB::table('contacto as c')
          ->join('juridico as j','c.fk_juridico','=','j.rif')
          ->select('c.cedula','c.nombre','c.apellido','c.funcion','c.fk_juridico','j.d_social as dsocial','j.rif as rif')
          ->where('c.nombre','LIKE','%'.$query.'%')
          ->orderBy('c.cedula','desc')
          ->paginate(7);
        return view('cliente.contacto.index',["contacto"=>$contactos,"searchText"=>$query]);
        }
    }

    public function create () {
      $juridico=DB::table('juridico')->get();
      return view("cliente.contacto.create",["juridico"=>$juridico]);
    }

    public function store (ContactoFormRequest $request) {
     $contacto = new Contacto;
     $contacto->cedula = $request->get('cedula');
     $contacto->nombre = $request->get('nombre');
     $contacto->apellido = $request->get('apellido');
     $contacto->funcion = $request->get('funcion');
     $contacto->fk_juridico = $request->get('fk_juridico');
     $contacto->save();
     return Redirect::to('cliente/contacto');
    }


     public function edit($contacto) {
      $contacto = Contacto::findOrFail($contacto);
      return view ("cliente.contacto.edit",["contacto"=>$contacto]);
     }


     public function update(ContactoFormRequest $request,$cedula) {
      $contacto = Contacto::findOrFail($cedula);
      $contacto->cedula = $request->get('cedula');
      $contacto->nombre = $request->get('nombre');
      $contacto->apellido = $request->get('apellido');
      $contacto->funcion = $request->get('funcion');
      $contacto->update();
      return Redirect::to('cliente/contacto');
     }

     public function destroy($cedula) {
       $contacto = Contacto::findOrFail($cedula);
       $contacto->delete();
       return Redirect::to('cliente/contacto');
     }

}
