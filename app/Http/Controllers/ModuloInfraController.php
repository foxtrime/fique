<?php

namespace App\Http\Controllers;

use App\Models\Modulo_Infraestrutura_Predial;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ModuloInfraController extends Controller
{
    public function envia(Request $request)
    {

        $data = Carbon::now()->locale('pt_BR')->format('d-m-Y');

        $modulo_infra = Modulo_Infraestrutura_Predial::find($request->id_infra);

        // dd($modulo_infra);
        $modulo_infra->chamado_aberto_infra = 0;
        $modulo_infra->data_chamado_fechado_infra = $data;

        $modulo_infra->save();

    }
}
