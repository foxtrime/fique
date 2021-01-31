<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relatorio extends Model
{
    protected $table = "relatorios";

    protected $fillable = [
        'enviado',
        'data',
    ];

    public function unidade()
    {
        return $this->belongsTo('App\Models\Unidade');
    }

    public function modulo_ti()
    {
        return $this->hasMany('App\Models\Modulo_Ti');
    }


}
