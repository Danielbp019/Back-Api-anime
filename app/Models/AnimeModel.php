<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimeModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'numero_capitulos',
        'visto',
        'comentarios'
    ];

    protected $table = 'animes';
}
