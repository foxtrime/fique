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

    public function modulo_infraestrutura_predial()
    {
        return $this->hasMany('App\Models\Modulo_Infraestrutura_Predial');
    }

    public function modulo_imunizacao()
    {
        return $this->hasMany('App\Models\Modulo_Imunizacao');
    }

    public function modulo_almoxarifado()
    {
        return $this->hasMany('App\Models\Modulo_Almoxarifado');
    }

    public function modulo_atencao_basica()
    {
        return $this->hasMany('App\Models\Modulo_Atencao_Basica');
    }


}
