<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atencao_Basica_Pergunta extends Model
{
    protected $table = "atencao_basica_perguntas";

    protected $fillable = [
        'titulo',
    ];
}
