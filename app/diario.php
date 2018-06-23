<?php

namespace candyucab;

use Illuminate\Database\Eloquent\Model;

class diario extends Model
{

  protected $table='diario';

  protected $primaryKey='codigo';

  public $timestamps=false;

  protected $fillable =
   [
        'codigo',
        'descripcion',
        'fecha_emision',
        'fecha_vencimiento' 
  ];

  protected $guarded = [];

}
