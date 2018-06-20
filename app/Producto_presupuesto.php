<?php

namespace candyucab;

use Illuminate\Database\Eloquent\Model;

class Producto_presupuesto extends Model
{

  /*la tabla a la que vamos a hacer referencia*/
  protected $table = 'producto_presupuesto';

  /*la clave de la tabla*/
  protected $primaryKey = 'codigo';

  /*evitar las dos columnas que agrega laravel de fecha de creacion y actualizacion*/
  public $timestamps= false;

  /*ahora, especificiar cuales campos queremos modificar de la tabla*/
  protected $fillable = [
  'codigo',
  'cantidad',
  'precio',
  'c_presupuesto',
  'c_producto'
  ];

  /*y cuales no*/
  protected $guarded = [];

}
