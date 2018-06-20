<?php

namespace candyucab;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{

  protected $table='descuento';

  protected $primaryKey='codigo';

  public $timestamps=false;

  protected $fillable =
   [
        'codigo',
        'porcentaje',
        'descripcion',
        'fk_producto'
  ];

  protected $guarded = [];

}
