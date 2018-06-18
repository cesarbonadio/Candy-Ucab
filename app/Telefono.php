<?php

namespace candyucab;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{

  /*la tabla a la que vamos a hacer referencia*/
  protected $table = 'telefono';

  /*la clave de la tabla*/
  protected $primaryKey = 'valor';

  /*evitar las dos columnas que agrega laravel de fecha de creacion y actualizacion*/
  public $timestamps= false;

  /*ahora, especificiar cuales campos queremos modificar de la tabla*/
  protected $fillable = [
  'valor',
  'tipo',
  'fk_juridico',
  'fk_naturale'
  ];

  /*y cuales no*/
  protected $guarded = [];

}
