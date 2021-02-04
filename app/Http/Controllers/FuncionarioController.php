<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Unidade;

class FuncionarioController extends Controller
{
    public function index ()
    {
        
        return view('funcionario.index');
    }

    public function create ()
    {
        
        $unidades = Unidade::all();
        // dd($unidades);

        return view('funcionario.create', compact('unidades'));
    }

    public function store(Request $request)
    {   
        // dd($request);

        $funcionario =  new Funcionario($request->all());

        $funcionario->save();

        return redirect(url('/funcionario'));


    }

}













