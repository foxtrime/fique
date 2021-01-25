<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ti_Pergunta extends Model
{
    protected $table = "ti_perguntas";

    protected $fillable = [
        'titulo',
    ];
}
