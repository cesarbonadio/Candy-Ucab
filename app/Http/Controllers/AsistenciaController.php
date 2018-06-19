<?php

namespace candyucab\Http\Controllers;

use Illuminate\Http\Request;
use candyucab\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Excel;
use candyucab\Asistencia;

class AsistenciaController extends Controller
{


 public function getimport(){

  return view('nomina/asistencia/index');
 }

public function postimport(Request $request){

  if($request->hasfile('asistencia')){
      $path=$request->file('asistencia')->getRealPath();
      $data=Excel::load($path)->get();
      if($data->count()){
          $value="";
          foreach ($data as $key => $value) {
              $asistencia_list[]=['codigo'=>$value->codigo,'c_empleado'=>$value->c_empleado,'c_horario'=>$value->c_horario,'hora_entrada'=>$value->hora_entrada,'hora_salida'=>$value->hora_salida];
          }
          if(!empty($asistencia_list)){
              Asistencia::insert($asistencia_list);
              \Session::flash('susses','Archivo Importado');
          }

      }
  }else{
      \Session::flash('warning','No hay archivo importado');
   }
   return Redirect::back();
 }

}
