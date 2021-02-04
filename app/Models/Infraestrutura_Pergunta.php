<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Infraestrutura_Pergunta extends Model
{
    protected $table = "infraestrutura_perguntas";

    protected $fillable = [
        'titulo',
    ];
}
