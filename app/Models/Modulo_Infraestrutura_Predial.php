<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modulo_Infraestrutura_Predial extends Model
{
    protected $table = "modulos_infraestrutura_predial";

    public $primaryKey = 'id_infra';
    
    protected $fillable = [
        'n_chamado_infra',
        'obs_infra',
        'chamado_aberto_infra',
        'data_chamado_fechado_infra',
        'data_chamado_aberto_infra',
        'relatorio_id_infra',
        'pergunta_id_infra',
    ];

    public function relatorio()
    {
        return $this->belongsTo('App\Models\Relatorio');
    }

}
