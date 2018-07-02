<?php

namespace candyucab;

use Illuminate\Database\Eloquent\Model;

class Pedido_estatus extends Model
{



    protected $table='pedido_estatus';

    protected $primaryKey='codigo';

    public $timestamps=false;

    protected $fillable =
     [
          'codigo',
          'cambio',
          'c_pedido',
          'c_estatus'
    ];

    protected $guarded = [
    ];




}
