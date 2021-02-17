<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farmacia_Pergunta extends Model
{
    protected $table = "farmacia_perguntas";

    protected $fillable = [
        'titulo',
    ];
}
