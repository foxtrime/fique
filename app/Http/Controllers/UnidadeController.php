<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidade;
use DataTables;

class UnidadeController extends Controller
{
   public function index()
   {
    $unidades = Unidade::all();
    return view('unidade.index',compact('unidades'));
   }

   public function create()
   {

    return view('unidade.create');
   }

   public function store(Request $request)
   {

    $unidade = new Unidade($request->all());

    $unidade->save();

    return redirect(url('/unidade'));

   }

   public function show()
   {

   }
 
}
