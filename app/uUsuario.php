<?php

namespace candyucab;

use Illuminate\Database\Eloquent\Model;

class uUsuario extends Model
{
  protected $table='usuario';

  protected $primaryKey='id';

  public $timestamps=false;

  protected $fillable =
   [

        'id',
        'username',
        'password',
        'puntos',
        'fk_rol',
        'fk_juridico',
        'fk_naturale',
        'fk_empleado'

  ];

  protected $guarded = [

  ];
}