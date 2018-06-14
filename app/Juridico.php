<?php

namespace candyucab;

use Illuminate\Database\Eloquent\Model;

class Juridico extends Model
{
  protected $table='juridico';

  protected $primaryKey='rif';

  //
  public $incrementing = false;

  public $timestamps=false;

  protected $fillable = [
        'rif',
        'correo',
        'd_social',
        'r_social',
        'pagina_web',
        'capital',
        'fk_lugar',
        'fk_lugar_fiscal',
        'fk_tienda',
        'num_carnet'
  ];

  protected $guarded = [

  ];

}
