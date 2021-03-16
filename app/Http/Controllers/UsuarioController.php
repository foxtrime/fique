<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Unidade;
use DataTables;


class UsuarioController extends Controller
{
    public function index()
    {

        $unidades = Unidade::all();
        

        $users = User::with('unidade')->get();
        // dd($users[0]->unidade->nome);
        return view('usuario.index', compact('users','unidades'));
    }
}
