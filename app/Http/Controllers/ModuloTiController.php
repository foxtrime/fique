<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modulo_Ti;
use Carbon\Carbon;

class ModuloTiController extends Controller
{


    public function envia(Request $request)
    {

    //   $teste = 'aaaa';

    //     return response()->json($teste);

        $data = Carbon::now()->locale('pt_BR')->format('d-m-Y');

        $modulo_ti = Modulo_Ti::find($request->id);

        $modulo_ti->chamado_aberto = 0;
        $modulo_ti->data_chamado_fechado = $data;

        $modulo_ti->save();

    }
}
