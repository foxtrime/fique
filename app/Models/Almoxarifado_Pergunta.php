<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Almoxarifado_Pergunta extends Model
{
    protected $table = "almoxarifado_perguntas";

    protected $fillable = [
        'titulo',
    ];
}
