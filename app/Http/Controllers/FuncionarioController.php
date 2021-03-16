<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Unidade;
use App\Models\Funcao;

class FuncionarioController extends Controller
{
    public function index ()
    {
        
        $funcionarios = Funcionario::with('unidades','funcao')->get();

        // dd($funcionarios[1]->funcao->nome);

        return view('funcionario.index', compact('funcionarios'));
    }

    public function create ()
    {
        

        $unidades = Unidade::all();
        // dd($unidades);

        $funcoes = Funcao::all();
        //  dd($funcoes);


        return view('funcionario.create', compact('unidades','funcoes'));
    }

    public function store(Request $request)
    {   
        // dd($request->unidade);

        $funcionario =  new Funcionario($request->all());

        //  dd($funcionario->funcao_id);
        $funcionario->save();

        DB::table('funcionarios_unidades')->insert(['unidade_id' => $request->unidade, 'funcionario_id' => $funcionario->id]);

        return redirect(url('/funcionario'));

    }
    

}













