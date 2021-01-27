<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modulo_Ti extends Model
{
    protected $table = "modulos_ti";

    protected $fillable = [
        'n_chamado',
        'obs',
        'chamado_aberto',
        'data_chamado_fechado',
        'relatorio_id',
        'pergunta_id',
    ];

    public function relatorio()
    {
        return $this->belongsTo('App\Models\Relatorio');
    }

}
