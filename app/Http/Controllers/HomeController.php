<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Modulo_ti;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $perfil = Auth::user();

        // Inicio Quantidade de chamados Abertos
        $modulo_ti = Modulo_ti::where('chamado_aberto', '=', 1)->get();
        $quantidade_chamado_aberto_ti  = $modulo_ti->count();
        // Fim Quantidade de chamados Abertos

        // Inicio Quantidade de chamados Resolvidos
        $modulo_ti = Modulo_ti::where('chamado_aberto', '=', 0)->get();
        $quantidade_chamado_resolvido_ti  = $modulo_ti->count();
        // Fim Quantidade de chamados Resolvidos

        $a = Modulo_ti::where('pergunta_id', '=', 1)->get();
        $qtd_a = $a->count();

        $b = Modulo_ti::where('pergunta_id', '=', 2)->get();
        $qtd_b = $b->count();
        
        $c = Modulo_ti::where('pergunta_id', '=', 3)->get();
        $qtd_c = $c->count();

        $d = Modulo_ti::where('pergunta_id', '=', 4)->get();
        $qtd_d = $d->count();

        $e = Modulo_ti::where('pergunta_id', '=', 5)->get();
        $qtd_e = $e->count();

        $f = Modulo_ti::where('pergunta_id', '=', 6)->get();
        $qtd_f = $f->count();

        return view('home', compact('perfil','quantidade_chamado_aberto_ti','quantidade_chamado_resolvido_ti','qtd_a','qtd_b','qtd_c','qtd_d','qtd_e','qtd_f'));
    }
}
