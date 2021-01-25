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
        
        // dd($modulo_ti);
        




        return view('relatorio.update', compact('relatorio','perguntas','modulo_ti'));
    }

    public function update(Request $request, $id)
    {


    }


}
