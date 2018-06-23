<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;
use candyucab\Http\Requests;
use candyucab\uUsuario;
use Illuminate\Support\Facades\Redirect;
use candyucab\Http\Requests\uUsuarioFormRequest;
use DB;

class uNatUsuarioController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
    	if($request)
    	{
    		$query=trim($request->get('searchText'));
    		$usuarios=DB::table('usuario')->where('id','LIKE','%'.$query.'%');
    		return view('Usuario.registroU.registro',["usuarios"=>$usuarios,"searchText"=>$query]);
    	}

    }
    public function create()
    {
    	return view("Usuario.registroU.registro");
    }
    public function store(uUsuarioFormRequest $request)
    {
    	$uUsuario=new uUsuario;
    	$uUsuario->username=$request->get('username');
    	$uUsuario->password=$request->get('password');
        $uUsuario->puntos='0';
        $uUsuario->fk_rol='3';
        $uUsuario->fk_juridico=$request->get('fk_juridico');
        $uUsuario->fk_naturale=$request->get('fk_naturale');
       	$uUsuario->fk_empleado=$request->get('fk_empleado');
       	$uUsuario->save();
       	return Redirect::to('usuario/registroN');
    }
    public function show ($id)
    {
    	return view("usuario.registroU.registro",["usuario"=>uUsuario::findOrFail($id)]);
    }
    public function update(uUsuarioFormRequest $request, $id)
    {
    	$usuario=uUsuario::findOrFail($id);
    	$uUsuario->username=$request->get('username');
    	$uUsuario->password=$request->get('password');
        $uUsuario->puntos=$request->get('puntos');
        $uUsuario->fk_rol=$request->get('fk_rol');
        $uUsuario->fk_juridico=$request->get('fk_juridico');
        $uUsuario->fk_naturale=$request->get('fk_naturale');
       	$uUsuario->fk_empleado=$request->get('fk_empleado');
       	$uUsuario->update();
       	return Redirect::to('usuario/registroU');


    }
    public function edit ($id)
    {
		return view("usuario.registroU.registro",["usuario"=>uUsuario::findOrFail($id)]);
    }
    public function destroy(){

    }
}
