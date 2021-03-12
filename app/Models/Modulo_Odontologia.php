<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modulo_Odontologia extends Model
{
    protected $table = "modulos_odontologia";

    public $primaryKey = 'id_odonto';

    protected $fillable = [
        'nome_odonto',
        'descri_odonto',
        'relatorio_id_odonto',
        'pergunta_id_odonto',
    ];

    public function relatorio()
    {
        return $this->belongsTo('App\Models\Relatorio');
    }


    



}
