<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = "funcionarios";

    protected $fillable = [
       'nome',
       'funcao_id',
    ];

    public function unidades()
    {
        return $this->belongsToMany('App\Models\Unidade','funcionarios_unidades');
    }

    public function funcao()
    {
        return $this->belongsTo('App\Models\Funcao');
    }
}
