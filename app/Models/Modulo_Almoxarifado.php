<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modulo_Almoxarifado extends Model
{
    protected $table = "modulos_almoxarifado";

    public $primaryKey = 'id_almo';

    protected $fillable = [
        'material_almo',
        'qtd_almo',
        'relatorio_id_almo',
        'pergunta_id_almo',
    ];

    public function relatorio()
    {
        return $this->belongsTo('App\Models\Relatorio');
    }
}
