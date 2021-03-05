<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modulo_Atencao_Basica extends Model
{
    protected $table = "modulos_atencao_basica";

    public $primaryKey = 'id_at_basi';

    protected $fillable = [
        'nome_at_basi',
        'descri_at_basi',
        'relatorio_id_at_basi',
        'pergunta_id_at_basi',
    ];

    public function relatorio()
    {
        return $this->belongsTo('App\Models\Relatorio');
    }
}
