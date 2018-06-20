<?php

namespace candyucab;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    /*la tabla a la que vamos a hacer referencia*/
    protected $table = 'producto';

    /*la clave de la tabla*/
    protected $primaryKey = 'codigo';

    /*evitar las dos columnas que agrega laravel de fecha de creacion y actualizacion*/
    public $timestamps= false;

    /*ahora, especificiar cuales campos queremos modificar de la tabla*/
    protected $fillable = [
    'codigo',
    'nombre',
    'descripcion',
    'precio',
    'ranking',
    'foto',
    'fk_tipo'
    ];

    /*y cuales no*/
    protected $guarded = [];

}
