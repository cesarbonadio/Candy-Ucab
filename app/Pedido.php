<?php

namespace candyucab;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{


  protected $table='pedido';

  protected $primaryKey='codigo';

  public $timestamps=false;

  protected $fillable =
   [
        'codigo',
        'fecha',
        'c_presupuesto'
  ];

  protected $guarded = [
  ];


}
