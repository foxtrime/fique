<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario_unidade extends Model
{
    protected $table = "funcionarios_unidades";

    protected $fillable = [
        'funcionario_id',
        'unidade_id',
    ];

    public function funcionarios()
    {
        // return $this->belongsToMany();
    }

    public function unidades()
    {
        return $this->belongsToMany('App\Models\Unidade');
    }


}
