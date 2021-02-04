<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Relatorio;
use App\Models\Unidade;
use App\Models\Modulo_Ti;
use App\Models\Ti_Pergunta;
use Carbon\Carbon;
use Auth;

class RelatorioController extends Controller
{
    public function index()
    {
        // Pega o Usuario Logado
        $user_logado = Auth::user();
                
        $relatorios = Relatorio::where('unidade_id','=', $user_logado->unidade_id)->with('unidade','modulo_ti')->get();

        // dd($relatorios[0]->modulo_ti);
        return view('relatorio.index', compact('relatorios'));

    }

    public function  create()
    {
        return view('relatorio.create');
    }

    public function store()
    {

    }

    public function edit($id)
    {

        $perguntas = Ti_Pergunta::all();

        $relatorio = Relatorio::find($id);

        $modulo_ti = Modulo_Ti::where('relatorio_id','=',$relatorio->id)->get();
        
        //  dd($modulo_ti);
        
        return view('relatorio.update', compact('relatorio','perguntas','modulo_ti'));
    }

    public function update(Request $request, $id)
    {
        
        // ===================================================MODULO TI=========================================================
        $resultados_ti = array_map(null, $request['id'], $request['pergunta_id'],$request['n_chamado'],$request['obs']);

        foreach($resultados_ti as $resultado_ti) {
            if($resultado_ti[0] != null && $resultado_ti[2] != null && $resultado_ti[3] != null){
               //Fazer o Update do valor no Banco de dados
                
               $update = Modulo_Ti::find($resultado_ti[0]);
               $update->n_chamado = $resultado_ti[2];
               $update->obs = $resultado_ti[3];
            //    $update->chamado_aberto = 1;   DEFAULT 1
               $update->save();
            
               // $a = $resultado_ti;
                // array_push($results,$a);
            }elseif($resultado_ti[0] == null && $resultado_ti[2] != null && $resultado_ti[3] != null){
                //Fazer o Create do Valor no Banco de dados
                $data = Carbon::now()->subDays(1)->locale('pt_BR')->format('d-m-Y');
               
                $insert = Modulo_Ti::create(['n_chamado' => $resultado_ti[2], 'obs' => $resultado_ti[3], 'relatorio_id' => $id,'pergunta_id'=> $resultado_ti[1],'data_chamado_aberto' => $data]);            
            }
        }
        // ===================================================MODULO TI=========================================================

        // ===================================================MODULO INFRAESTRUTURA=============================================

        // ===================================================MODULO INFRAESTRUTURA=============================================


        return redirect(url('/relatorio'));   
    }

}
