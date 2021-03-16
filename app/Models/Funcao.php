<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{
    protected $table = "funcoes";

    protected $fillable = [
        'nome',
        'valor',
    ];

    public function funcionarios()
    {
        return $this->hasMany('App\Models\Funcionario');
    }

}
