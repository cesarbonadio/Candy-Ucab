<?php

namespace candyucab;

use Illuminate\Database\Eloquent\Model;

class Estatus extends Model
{

  protected $table='estatus';

  protected $primaryKey='codigo';

  public $timestamps=false;

  protected $fillable =
   [
        'codigo',
        'descripcion'
  ];

  protected $guarded = [];

}
