<?php

namespace candyucab;

use Illuminate\Database\Eloquent\Model;

class Rol_Privilegio extends Model
{

  /*la tabla a la que vamos a hacer referencia*/
  protected $table = 'rol_privilegio';

  /*la clave de la tabla*/
  protected $primaryKey = 'codigo';

  /*evitar las dos columnas que agrega laravel de fecha de creacion y actualizacion*/
  public $timestamps= false;

  /*ahora, especificiar cuales campos queremos modificar de la tabla*/
  protected $fillable = [
  'codigo',
  'c_rol',
  'c_privilegio'  
	];

  /*y cuales no*/
  protected $guarded = [];

}
