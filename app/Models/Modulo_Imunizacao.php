<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modulo_Imunizacao extends Model
{
    protected $table = "modulos_imunizacao";

    public $primaryKey = 'id_imuni';

    protected $fillable = [
        'material_imuni',
        'qtd_imuni',
        'relatorio_id_imuni',
        'pergunta_id_imuni',
    ];

    public function relatorio()
    {
        return $this->belongsTo('App\Models\Relatorio');
    }
}
