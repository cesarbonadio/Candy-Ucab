<?php

namespace candyucab;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{

  /*la tabla a la que vamos a hacer referencia*/
  protected $table = 'contacto';

  /*la clave de la tabla*/
  protected $primaryKey = 'cedula';

  /*evitar las dos columnas que agrega laravel de fecha de creacion y actualizacion*/
  public $timestamps= false;

  /*ahora, especificiar cuales campos queremos modificar de la tabla*/
  protected $fillable = [
  'cedula',
  'nombre',
  'apellido',
  'funcion',
  'fk_juridico'
  ];

  /*y cuales no*/
  protected $guarded = [];

}
