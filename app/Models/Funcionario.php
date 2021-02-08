<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = "funcionarios";

    protected $fillable = [
       'nome',
       'funcao'
    ];

    public function unidades()
    {
        return $this->belongsToMany('App\Models\Unidade','funcionarios_unidades');
    }
}
