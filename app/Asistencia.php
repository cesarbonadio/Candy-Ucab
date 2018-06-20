<?php

namespace candyucab;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
  protected $table='asistencia';

    protected $primaryKey='codigo';

    public $timestamps=false;

    protected $fillable = [

          'c_empleado',
          'c_horario',
          'hora_entrada',
          'hora_salida',




    ];

    protected $guarded = [

    ];
}
