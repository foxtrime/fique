<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Unidade;

class FuncionarioController extends Controller
{
    public function index ()
    {
        
        $funcionarios = Funcionario::with('unidades')->get();

        // dd($funcionarios[3]->unidades[0]->id);

        return view('funcionario.index', compact('funcionarios'));
    }

    public function create ()
    {
        
        $unidades = Unidade::all();
        // dd($unidades);

        return view('funcionario.create', compact('unidades'));
    }

    public function store(Request $request)
    {   
        // dd($request->unidade);

        $funcionario =  new Funcionario($request->all());

        // dd($funcionario);
        $funcionario->save();

        DB::table('funcionarios_unidades')->insert(['unidade_id' => $request->unidade, 'funcionario_id' => $funcionario->id]);

        return redirect(url('/funcionario'));


    }

}













