<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PuntosHistorial extends Model
{
    public $timestamps = false; // usamos nuestro campo "fecha"

    protected $table = 'puntos_historial';

    protected $fillable = [
        'user_id',
        'accion',
        'cantidad',
        'fecha',
    ];
}