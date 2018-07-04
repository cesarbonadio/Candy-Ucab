<?php

namespace candyucab;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{


  protected $table='rol';

  protected $primaryKey='codigo';

  public $timestamps=false;

  protected $fillable =
   [
        'codigo',
        'descripcion'
  ];

  protected $guarded = [
  ];


}
