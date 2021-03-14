<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modulo_Farmacia extends Model
{
    protected $table = "modulos_farmacia";

    public $primaryKey = 'id_far';

    protected $fillable = [
        'nome_far',
        'descri_far',
        'relatorio_id_far',
        'pergunta_id_far',
    ];

    public function relatorio()
    {
        return $this->belongsTo('App\Models\Relatorio');
    }

}
