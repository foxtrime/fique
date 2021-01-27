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
        // Filtra o relatorio do usuario logado
        // $relatorios = Relatorio::where('unidade_id','=', $user_logado->unidade_id)->with('unidades')->get();
        
        $relatorios = Relatorio::where('unidade_id','=', $user_logado->unidade_id)->with('unidade')->get();

        // dd($relatorios);
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
        
        // $id = $request['id'];

        // $pergunta_id = $request['pergunta_id'];

        // $n_chamado = $request['n_chamado'];

        // $obs = $request['obs'];

        $resultados = array_map(null, $request['id'], $request['pergunta_id'],$request['n_chamado'],$request['obs']);
        //  dd($resultados);

        // $results = [];

        foreach($resultados as $resultado) {
            if($resultado[0] != null && $resultado[2] != null && $resultado[3] != null){
               //Fazer o Update do valor no Banco de dados
                
               $update = Modulo_Ti::find($resultado[0]);
               $update->n_chamado = $resultado[2];
               $update->obs = $resultado[3];
               $update->save();

            //    $update->update($resultado->only(['n_chamado', 'obs']));
            //    dd($update);



            
               // $a = $resultado;
                // array_push($results,$a);
            }elseif($resultado[0] == null && $resultado[2] != null && $resultado[3] != null){
                //Fazer o Create do Valor no Banco de dados

               
                $insert = Modulo_Ti::create(['n_chamado' => $resultado[2], 'obs' => $resultado[3], 'relatorio_id' => $id,'pergunta_id'=> $resultado[1]]);
                
                // $a = $resultado;
                // array_push($results,$a);
                
            }
        }

        // dd($results);

        return redirect(url('/relatorio'));
        
    }


}
