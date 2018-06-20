<?php

namespace candyucab;

use Illuminate\Database\Eloquent\Model;

class Natural extends Model
{

  protected $table='naturale';

  protected $primaryKey='cedula';

  public $timestamps=false;

  protected $fillable =
   [

        'cedula',
        'rif',
        'correo',
        'nombre',
        'apellido',
        'fk_lugar',
        'fk_tienda',
        'num_carnet'

  ];

  protected $guarded = [

  ];
}
