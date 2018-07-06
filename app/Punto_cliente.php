<?php

namespace candyucab;

use Illuminate\Database\Eloquent\Model;

class Punto_cliente extends Model
{

  /*la tabla a la que vamos a hacer referencia*/
  protected $table = 'punto_cliente';

  /*la clave de la tabla*/
  protected $primaryKey = 'codigo';

  /*evitar las dos columnas que agrega laravel de fecha de creacion y actualizacion*/
  public $timestamps= false;

  /*ahora, especificiar cuales campos queremos modificar de la tabla*/
  protected $fillable = [
  'codigo',
  'adquirido',
  'valor',
  'fk_juridico',
  'fk_naturale',
  'fk_pedido',
  'fk_punto'
  ];

  /*y cuales no*/
  protected $guarded = [];

}
