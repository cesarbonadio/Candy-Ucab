<?php

namespace candyucab;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{

  /*la tabla a la que vamos a hacer referencia*/
  protected $table = 'presupuesto';

  /*la clave de la tabla*/
  protected $primaryKey = 'codigo';

  /*evitar las dos columnas que agrega laravel de fecha de creacion y actualizacion*/
  public $timestamps= false;

  /*ahora, especificiar cuales campos queremos modificar de la tabla*/
  protected $fillable = [
  'codigo',
  'total',
  'fecha',
  'fk_juridico',
  'fk_naturale',
  'fk_tienda',
  'fk_tienda_compra',
  'fk_usuario'
  ];

  /*y cuales no*/
  protected $guarded = [];

}
