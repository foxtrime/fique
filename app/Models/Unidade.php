<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $table = "unidades";

    protected $fillable = [
        'nome'
    ];

    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function relatorios()
    {
        return $this->hasMany('App\Models\Relatorio');
    }

    public function funcionarios()
    {
        return $this->belongsToMany('App\Models\Funcionario', 'funcionarios_unidades');
    }
}
