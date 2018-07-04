<?php

namespace candyucab;

use Illuminate\Database\Eloquent\Model;

class Diario_descuento extends Model
{

  protected $table='Diario_descuento';

  protected $primaryKey='codigo';

  public $timestamps=false;

  protected $fillable =
   [
        'codigo',
        'c_diario',
        'c_descuento'
  ];

  protected $guarded = [];

}
