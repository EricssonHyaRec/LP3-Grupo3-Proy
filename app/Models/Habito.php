<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habito extends Model
{
    use HasFactory;

    protected $table = 'habitos';

    protected $fillable = [
        'user_id',
        'nombre',
        'tipo',
        'polaridad',
        'unidad',
        'puntos_por_unidad',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
