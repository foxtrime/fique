<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidade;
use App\Models\Funcionario;


class IndicadorController extends Controller
{
   public function index()
   {

      $funcionarios = Funcionario::with('unidades','funcao')->get();
     
      $unidades = Unidade::with('funcionarios')->get();
       dd($unidades);


      return view('indicador.index', compact('unidades'));
   }
}
