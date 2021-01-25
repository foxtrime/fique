<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        // $a = Carbon::now()->locale('pt_BR')->format('d-m-Y');
        // dd($a);

        

        // dd($perfil);

        // 'super-admin',
        // 'admin',
        // 'user',
        // 'user_ti',
        // 'user_infra',

        // if($perfil == "super-admin"){
            
        //     return view('home');

        // }elseif($perfil == "admin"){

        //     return view('home');

        // }elseif($perfil == "user"){
        //     return view('home');

        // }elseif($perfil == "user_ti"){
        //     return view('home');

        // }elseif($perfil == "user_infra"){
        //     return view('home');

        // }

        // $user = Auth::user();
        // dd($user);

        return view('home');
    }
}
