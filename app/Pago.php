<?php

namespace candyucab;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{

  protected $table='pago';

  protected $primaryKey='codigo';

  public $timestamps=false;

  protected $fillable =
   [
        'codigo',
        'monto',
        'fecha',
        'fk_pedido',
        'fk_medio_pago'
  ];

  protected $guarded = [];

}
