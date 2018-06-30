<?php

namespace candyucab;

use Illuminate\Database\Eloquent\Model;

class Medio extends Model {

  /*la tabla a la que vamos a hacer referencia*/
  protected $table = 'medio_pago';

  /*la clave de la tabla*/
  protected $primaryKey = 'codigo';

  /*evitar las dos columnas que agrega laravel de fecha de creacion y actualizacion*/
  public $timestamps= false;

  /*ahora, especificiar cuales campos queremos modificar de la tabla*/
  protected $fillable = [
  'codigo',
  'tipo',
  'num_tarjeta',
  'marca_tarjeta',
  'num_cheque',
  'fk_juridico',
  'fk_naturale'
  ];

  /*y cuales no*/
  protected $guarded = [];

}
