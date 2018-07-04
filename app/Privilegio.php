<?php

namespace candyucab;

use Illuminate\Database\Eloquent\Model;

class Privilegio extends Model
{


  protected $table='privilegio';

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
