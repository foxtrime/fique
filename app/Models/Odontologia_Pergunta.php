<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Odontologia_Pergunta extends Model
{
    protected $table = "odontologia_perguntas";

    protected $fillable = [
        'titulo',
    ];
}
