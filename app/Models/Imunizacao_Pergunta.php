<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imunizacao_Pergunta extends Model
{
    protected $table = "imunizacao_perguntas";

    protected $fillable = [
        'titulo',
    ];
}
